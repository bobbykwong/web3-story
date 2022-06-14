/**
 * External Dependencies
 */
import filter from 'lodash/filter';
import pick from 'lodash/pick';
import map from 'lodash/map';
import get from 'lodash/get';

/**
 * WordPress dependencies
 */
const { Component, Fragment } = wp.element;
const { __, sprintf } = wp.i18n;
const {
	IconButton,
	DropZone,
	FormFileUpload,
	PanelBody,
	RangeControl,
	SelectControl,
	ToggleControl,
	Toolbar,
	withNotices,
} = wp.components;
const {
	BlockControls,
	MediaUpload,
	MediaPlaceholder,
	InspectorControls,
	mediaUpload,
} = wp.editor;

/**
 * Internal dependencies
 */
import GalleryImage from './gallery-image';



const ALLOWED_MEDIA_TYPES = [ 'image' ];

export const pickRelevantMediaFiles = ( image ) => {

	const imageProps = pick( image, [ 'alt', 'id', 'link', 'caption', 'sizes', 'url' ] );

	const fullImageWidth = get( image, [ 'sizes', 'full', 'width' ] ) || get( image, [ 'media_details', 'sizes', 'full', 'width' ] );
	const fullImageHeight = get( image, [ 'sizes', 'full', 'height' ] ) || get( image, [ 'media_details', 'sizes', 'full', 'height' ] );

	const aspectRatio = (fullImageWidth / fullImageHeight).toPrecision(10);

	var imgBigDimensions = "";

	if (get( image, [ 'sizes', 'mauer_grand_softcropped', 'url' ] )) {
		imageProps.imgBigUrl = get( image, [ 'sizes', 'mauer_grand_softcropped', 'url' ] );
		imgBigDimensions = image.sizes.mauer_grand_softcropped.width + "x" + image.sizes.mauer_grand_softcropped.height;
	} else {
		imageProps.imgBigUrl = image.url;
		imgBigDimensions = fullImageWidth + "x" + fullImageHeight;
	}

	imageProps.imgRegUrl = get( image, [ 'sizes', 'mauer_thumb_4', 'url' ] ) || get( image, [ 'media_details', 'sizes', 'mauer_thumb_4', 'source_url' ] ) || image.url;
	imageProps.imgSplUrl = get( image, [ 'sizes', 'large', 'url' ] ) || get( image, [ 'media_details', 'sizes', 'large', 'source_url' ] ) || image.url;


	imageProps.aspectRatio = aspectRatio;
	imageProps.imgBigDimensions = imgBigDimensions;

	return imageProps;
};



export function pswpFigureClass( nuOfImages, imgNum ) {
	var figureClass = "";
	// even number of images in the gallery
	if (nuOfImages % 2 == 0) {
		if (imgNum % 2 != 0) {figureClass = "mauer-essentialist-gallery-pswp-tile-1-of-2";}
		else {figureClass = "mauer-essentialist-gallery-pswp-tile-2-of-2";}
	}
	// odd number of images in the gallery
	else if (nuOfImages % 2 != 0 && nuOfImages != 1) {
		// not the last three
		if (nuOfImages - imgNum >= 3) {
			if (imgNum % 2 != 0) {figureClass = "mauer-essentialist-gallery-pswp-tile-1-of-2";}
			else {figureClass = "mauer-essentialist-gallery-pswp-tile-2-of-2";}
		}
		// the last three
		else if (nuOfImages - imgNum < 3) {
			if (nuOfImages - imgNum == 2) {figureClass = "mauer-essentialist-gallery-pswp-tile-1-of-3";}
			else if (nuOfImages - imgNum == 1) {figureClass = "mauer-essentialist-gallery-pswp-tile-2-of-3";}
			else if (nuOfImages - imgNum == 0) {figureClass = "mauer-essentialist-gallery-pswp-tile-3-of-3";}
		}
	}
	// just one image in the gallery
	else if (nuOfImages == 1) {
		figureClass = "mauer-essentialist-gallery-pswp-tile-1-and-only";
	}

	return 'mauer-essentialist-gallery-pswp-tile ' + figureClass;
}



class GalleryEdit extends Component {
	constructor() {
		super( ...arguments );

		this.onSelectImage = this.onSelectImage.bind( this );
		this.onSelectImages = this.onSelectImages.bind( this );
		this.toggleImageCrop = this.toggleImageCrop.bind( this );
		this.onRemoveImage = this.onRemoveImage.bind( this );
		this.setImageAttributes = this.setImageAttributes.bind( this );
		this.addFiles = this.addFiles.bind( this );
		this.uploadFromFiles = this.uploadFromFiles.bind( this );
		this.setAttributes = this.setAttributes.bind( this );

		this.state = {
			selectedImage: null,
		};

	}

	setAttributes( attributes ) {
		if ( attributes.ids ) {
			throw new Error( __('The "ids" attribute should not be changed directly. It is managed automatically when "images" attribute changes', 'mauer-essentialist-gallery') );
		}

		if ( attributes.images ) {
			attributes = {
				...attributes,
				ids: map( attributes.images, 'id' ),
			};
		}

		this.props.setAttributes( attributes );
	}

	onSelectImage( index ) {
		return () => {
			if ( this.state.selectedImage !== index ) {
				this.setState( {
					selectedImage: index,
				} );
			}
		};
	}

	onRemoveImage( index ) {
		return () => {
			const images = filter( this.props.attributes.images, ( img, i ) => index !== i );
			this.setState( { selectedImage: null } );
			this.setAttributes( {images} );
		};
	}

	onSelectImages( images ) {
		this.setAttributes( {
			images: images.map( ( image ) => pickRelevantMediaFiles( image ) ),
		} );
	}

	toggleImageCrop() {
		this.setAttributes( { imageCrop: ! this.props.attributes.imageCrop } );
	}

	getImageCropHelp( checked ) {
		return checked ? __( 'Thumbnails are cropped to align.', 'mauer-essentialist-gallery' ) : __( 'Thumbnails are not cropped.', 'mauer-essentialist-gallery' );
	}

	setImageAttributes( index, attributes ) {
		const { attributes: { images } } = this.props;
		const { setAttributes } = this;
		if ( ! images[ index ] ) {
			return;
		}
		setAttributes( {
			images: [
				...images.slice( 0, index ),
				{
					...images[ index ],
					...attributes,
				},
				...images.slice( index + 1 ),
			],
		} );
	}

	uploadFromFiles( event ) {
		this.addFiles( event.target.files );
	}

	addFiles( files ) {
		const currentImages = this.props.attributes.images || [];
		const { noticeOperations } = this.props;
		const { setAttributes } = this;
		mediaUpload( {
			allowedTypes: ALLOWED_MEDIA_TYPES,
			filesList: files,
			onFileChange: ( images ) => {
				const imagesNormalized = images.map( ( image ) => pickRelevantMediaFiles( image ) );
				setAttributes( {
					images: currentImages.concat( imagesNormalized ),
				} );
			},
			onError: noticeOperations.createErrorNotice,
		} );
	}

	componentDidUpdate( prevProps ) {
		// Deselect images when deselecting the block
		if ( ! this.props.isSelected && prevProps.isSelected ) {
			this.setState( {
				selectedImage: null,
				captionSelected: false,
			} );
		}
	}

	componentDidMount() {
		//
	}

	render() {
		const { attributes, isSelected, className, noticeOperations, noticeUI } = this.props;
		const { images, align } = attributes;

		const dropZone = (
			<DropZone
				onFilesDrop={ this.addFiles }
			/>
		);

		const controls = (
			<BlockControls>
				{ !! images.length && (
					<Toolbar>
						<MediaUpload
							onSelect={ this.onSelectImages }
							allowedTypes={ ALLOWED_MEDIA_TYPES }
							multiple
							gallery
							value={ images.map( ( img ) => img.id ) }
							render={ ( { open } ) => (
								<IconButton
									className="components-toolbar__control"
									label={ __( 'Edit Gallery', 'mauer-essentialist-gallery' ) }
									icon="edit"
									onClick={ open }
								/>
							) }
						/>
					</Toolbar>
				) }
			</BlockControls>
		);

		if ( images.length === 0 ) {
			return (
				<Fragment>
					{ controls }
					<MediaPlaceholder
						icon="format-gallery"
						className={ className }
						labels={ {
							title: __( 'Essentialist Gallery', 'mauer-essentialist-gallery' ),
							instructions: __( 'Drag images, upload new ones or select files from your library.', 'mauer-essentialist-gallery' ),
						} }
						onSelect={ this.onSelectImages }
						accept="image/*"
						allowedTypes={ ALLOWED_MEDIA_TYPES }
						multiple
						notices={ noticeUI }
						onError={ noticeOperations.createErrorNotice }
					/>
				</Fragment>
			);
		}

		return (
			<Fragment>
				{ controls }
				<InspectorControls>
				</InspectorControls>
				{ noticeUI }


				<div class="mauer-essentialist-gallery-pswp mauer-essentialist-gallery-pswp-in-admin-panel" itemscope="" itemtype="http://schema.org/ImageGallery">
					{ dropZone }
					{ images.map( ( img, index ) => {
						/* translators: %1$d is the order number of the image, %2$d is the total number of images. */
						const ariaLabel = __( sprintf( 'image %1$d of %2$d in gallery', ( index + 1 ), images.length ), 'mauer-essentialist-gallery' );

						var imgNum = index + 1;
						const figureClass = pswpFigureClass( images.length, imgNum );


						if (images.length > 1) {
							var imgRegUrl = img.imgRegUrl;
						} else {
							var imgRegUrl = img.imgSplUrl;
						}

						return (
							<GalleryImage
								url={`${ imgRegUrl }`}
								alt={ img.alt }
								id={ img.id }
								isSelected={ isSelected && this.state.selectedImage === index }
								onRemove={ this.onRemoveImage( index ) }
								onSelect={ this.onSelectImage( index ) }
								setAttributes={ ( attrs ) => this.setImageAttributes( index, attrs ) }
								caption={ img.caption }
								aria-label={ ariaLabel }
								classname="mauer-essentialist-gallery-pswp-img"
								data-aspect-ratio = { img.aspectRatio }
								figureClass = { figureClass }
							/>
						);
					} ) }

					<div className="mauer-essentialist-gallery-admin-clearfix"></div>

					{ isSelected &&
						<div className="blocks-gallery-item has-add-item-button">
							<FormFileUpload
								multiple
								isLarge
								className="block-library-gallery-add-item-button"
								onChange={ this.uploadFromFiles }
								accept="image/*"
								icon="insert"
							>
								{ __( 'Upload an image' ) }
							</FormFileUpload>
						</div>
					}
				</div>

			</Fragment>
		);
	}
}

export default withNotices( GalleryEdit );
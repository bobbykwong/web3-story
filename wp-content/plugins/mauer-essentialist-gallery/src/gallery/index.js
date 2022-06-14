/**
 * External dependencies
 */
import filter from 'lodash/filter';
import every from 'lodash/every';
import map from 'lodash/map';
import some from 'lodash/some';

/**
 * WordPress dependencies
 */
const { __ } = wp.i18n;
const { createBlock } = wp.blocks;
const { RichText, mediaUpload } = wp.editor;
const { createBlobURL } = wp.blob;
const { G, Path, SVG } = wp.components;

/**
 * Internal dependencies
 */
import { default as edit, pickRelevantMediaFiles, pswpFigureClass } from './edit';

const blockAttributes = {
	images: {
		type: 'array',
		default: [],
		source: 'query',
		selector: '.wp-block-mauer-essentialist-gallery figure',
		query: {
			id: {
				source: 'attribute',
				selector: 'img.mauer-essentialist-gallery-pswp-img',
				attribute: 'data-id',
			},

			alt: {
				source: 'attribute',
				selector: 'img.mauer-essentialist-gallery-pswp-img',
				attribute: 'alt',
				default: '',
			},
			caption: {
				type: 'string',
				source: 'html',
				selector: 'figcaption',
			},
			imgRegUrl: {
				source: 'attribute',
				selector: 'img.mauer-essentialist-gallery-pswp-img',
				attribute: 'src',
			},
			imgBigUrl: {
				source: 'attribute',
				selector: 'a.mauer-essentialist-gallery-pswp-big-img-link',
				attribute: 'href',
			},
			imgSplUrl: {
				source: 'attribute',
				selector: 'img.mauer-essentialist-gallery-pswp-img',
				attribute: 'data-img-spl-url',
			},
			url: {
				source: 'attribute',
				selector: 'img.mauer-essentialist-gallery-pswp-img',
				attribute: 'data-img-full-url',
			},
			aspectRatio: {
				source: 'attribute',
				selector: 'img.mauer-essentialist-gallery-pswp-img',
				attribute: 'data-aspect-ratio',
			},
			imgBigDimensions: {
				source: 'attribute',
				selector: 'a.mauer-essentialist-gallery-pswp-big-img-link',
				attribute: 'data-size',
			},
		},
	},
	ids: {
		type: 'array',
		default: [],
	},
};

export const name = 'mauer-essentialist/gallery';

const parseShortcodeIds = ( ids ) => {
	if ( ! ids ) {
		return [];
	}

	return ids.split( ',' ).map( ( id ) => (
		parseInt( id, 10 )
	) );
};

export const settings = {
	title: __( 'Essentialist Gallery' ),
	description: __( 'A neat automatically stacked gallery of images with a lightbox.', 'mauer-essentialist-gallery' ),
	icon: <SVG viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><Path fill="none" d="M0 0h24v24H0V0z" /><G><Path d="M20 4v12H8V4h12m0-2H8L6 4v12l2 2h12l2-2V4l-2-2z" /><Path d="M12 12l1 2 3-3 3 4H9z" /><Path d="M2 6v14l2 2h14v-2H4V6H2z" /></G></SVG>,
	category: 'common',
	keywords: [ __( 'images', 'mauer-essentialist-gallery' ), __( 'photos', 'mauer-essentialist-gallery' ) ],
	attributes: blockAttributes,
	supports: {
		align: true,
	},

	edit,

	save( { attributes } ) {
		const { images } = attributes;
		return (

			<div>
				<div class="mauer-essentialist-gallery-pswp-wrapper">
					<div class="mauer-essentialist-gallery-pswp" itemscope="" itemtype="http://schema.org/ImageGallery" data-pswp-uid="1">

						{ images.map( ( image, index ) => {
							const figureClass = pswpFigureClass(images.length, index + 1);
							var imgBigUrl = image.imgBigUrl;
							var imgRegUrl = image.imgRegUrl;

							if (images.length == 1) {imgRegUrl = image.imgSplUrl;}

							const img =
								<a class="mauer-essentialist-gallery-pswp-big-img-link" href={`${ imgBigUrl }`} itemprop="contentUrl" data-size={`${ image.imgBigDimensions }`}>
									<img
										className="mauer-essentialist-gallery-pswp-img"
										src={ imgRegUrl }
										alt={ image.alt }
										data-id={ image.id }
										data-img-full-url = { image.url }
										data-img-spl-url = { image.imgSplUrl }
										data-aspect-ratio = { image.aspectRatio }
									/>
								</a>;

							return (
								<figure class={`${ figureClass }`} itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
									{ img }
									<RichText.Content tagName="figcaption" value={ image.caption } />
								</figure>
							);

						} ) }

					</div>
					<div class="clearfix"></div>
				</div>
			</div>

		);
	}

};
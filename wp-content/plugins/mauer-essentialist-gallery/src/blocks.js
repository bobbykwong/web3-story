/**
 * Gutenberg Blocks
 */

const { registerBlockType } = wp.blocks;

import './gallery/index.js';
import { settings } from './gallery/index';
registerBlockType( `mauer-essentialist/gallery`, { category: "common", ...settings } );
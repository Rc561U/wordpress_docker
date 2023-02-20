import {registerBlockType} from "@wordpress/blocks";
import "./style.scss";
import "./editor.scss";
import Edit from "./edit"
import Save from "./save"

registerBlockType('gutenberg-examples/example-01-basic', {
    edit: Edit,
    save: Save,
});

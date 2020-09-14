/**
 * Wordpress dependencies
 */
const { __ } = wp.i18n;
const { Component } = wp.element;

/*
 * Internal dependencies
 */
import CustomInspector from './inspector.js'

/*
 * Editor component
 */
class Editor extends Component {
    constructor(props) {
        super(props);
    }

    render() {

        // Destruct important props
        const { attributes: { content },
            setAttributes, isSelected, clientId, className } = this.props;

        return (

            <div className={className}>

                <CustomInspector />

                <span>{ content }</span>

            </div>
        )
    }
}

export default Editor;

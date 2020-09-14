/**
 * Wordpress dependencies
 */
const { __ } = wp.i18n;
const { PanelBody, PanelRow } = wp.components;
const { InspectorControls } = wp.blockEditor;
const { Component, Fragment } = wp.element;

/*
 * Internal dependencies
 */
import Documentation from '../../../components/documentation';

/*
* Editor component
*/
class CustomInspector extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        return (

            <Fragment>
                <Documentation>
                    <p>
                        {__('My help content', 'custom-blocks')}
                    </p>
                </Documentation>
                <InspectorControls>
                    <PanelBody
                        title={__('My Block Settings', 'custom-blocks')}
                        icon="welcome-widgets-menus"
                        initialOpen={true}
                    >
                        <PanelRow>
                            {__('My Panel Inputs and Labels', 'custom-blocks')}
                        </PanelRow>
                    </PanelBody>
                </InspectorControls>
            </Fragment>
        )

    }
};

export default CustomInspector;

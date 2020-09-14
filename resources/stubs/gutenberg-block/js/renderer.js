/**
* Wordpress dependencies
*/
const { __ } = wp.i18n;

const Renderer = (props) => {

  // Destruct important props
  const { attributes: { content }, className } = props;

  return (

    <span>{ content }</span>

  )

}

export default Renderer;

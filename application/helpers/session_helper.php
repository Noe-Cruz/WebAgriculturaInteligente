<?php
function verifica_sesion()
{
	$CI = &get_instance();
	if (!$CI->session->has_userdata( "uid" )){
			redirect( base_url() );
	}
    else if(!$CI->session->has_userdata( "correo" )){
        redirect( base_url() );
    }
    else if(!$CI->session->has_userdata( "idToken" )){
        redirect( base_url() );
    }
}
?>
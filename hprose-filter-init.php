<?php

define ('XXTEA_KEY', ':LKJaskjdowkjlqwkejsdlifuPOiup247');

function decrypt ($encrypt_string){
	return xxtea_decrypt(base64_decode($encrypt_string), XXTEA_KEY);
}

function encrypt ($content){
	return base64_encode(xxtea_encrypt($content, XXTEA_KEY));
}

class serverFilter implements \Hprose\Filter
{
	function inputFilter ( $data, $context )
    {
    	file_put_contents('tmp.log', $data . PHP_EOL, FILE_APPEND);
        return decrypt($data);
    }

    function outputFilter ( $data, $context )
    {
    	file_put_contents('tmp.log', $data . PHP_EOL, FILE_APPEND);
        return encrypt($data);
    }
}

class clientCryptFilter implements \Hprose\Filter
{
	function inputFilter ( $data, $context )
    {
        return decrypt($data);
    }

    function outputFilter ( $data, $context )
    {
        return encrypt($data);
    }
}



// var_dump(encrypt(array("name"=>'laoliu', 'age'=> 37)));
// var_dump(decrypt('KHtw+xPLPHRe1jAOWdwlfA=='));
// B/ZtmxgpcTDU68iKzA1Kg6elcbRjfOxvOJWRY4YC5xdoI2Ks2huCSQ==
// var_dump(decrypt('B/ZtmxgpcTDU68iKzA1Kg6elcbRjfOxvOJWRY4YC5xdoI2Ks2huCSQ=='));
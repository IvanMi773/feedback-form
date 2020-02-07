<?php

function saveInXmlFile($filename, $first_name, $last_name, $email, $phone_number, $photo) {
        $xml = new domDocument("1.0", "utf-8");

        $xml->preserveWhiteSpace = false;
        $xml->formatOutput = true;

        $xml->load($filename);

        $users = $xml->documentElement;
        $user = $users->appendChild($xml->createElement('user'));
        $user->appendChild($xml->createElement('first_name', $first_name));
        $user->appendChild($xml->createElement('last_name', $last_name));
        $user->appendChild($xml->createElement('phone_number', $email));
        $user->appendChild($xml->createElement('email', $phone_number));
        $user->appendChild($xml->createElement('photo', $photo));

        $xml->save($filename);

}

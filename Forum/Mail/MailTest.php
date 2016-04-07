<?php
require './MainMail.php';
if(sendMail("Genni Pig","pappumishra@mailinator.com","Test Subject","Test Body"))
{
echo "sent";
}
else
{
echo "Error";
}
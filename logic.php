<?php

// CSCIE-15 Dynamic Web Applications. Fall, 2014
//     Project P2 - The XKCD Password Generator

// The 20 word dictionary used to generate the XKCD password

$words = array("snow", "white", "doc", "grumpy", "happy", "sleepy", "bashful", "sneezy", "dopey", "papa",
		"smurfette", "hefty", "brainy", "grouchy", "clumsy", "greedy", "jokey",
		"chef", "vanity", "handy");

// The Symbols to choose from to add to the end of the XKCD password, if desired

$symbols = array("!", "@", "#", "$", "%", "^", "&", "*", "~", "?");

// The password array that gets displayed back on the page containing the generated xKCD password

$password = array("");

// The Number of words entered by the user

$arrlength = $_GET['numWords'];

// If the Number of words have been entered by the user, and the entry is a number within the 
//   correct range (minimum is 1, maximum is 20)
if (isset($_GET['numWords']) && is_numeric($arrlength) && ($arrlength > 0 && $arrlength < 21))
{
   // First, mix up the words array to further randomize each password generated
   shuffle($words);

   // Generate the random keys to the words array
   $rand_keys = array_rand($words, $arrlength);

   // And away we go .... Diana - Don't you remember the Jackie Gleason show ??
   // Create the password array
   //   Stick the random number in every other location, starting at 0
   //   Stick either a "-" or a number (if the user chose to add numbers to the password)
   //    in every other location startng at 1

   for($i=0, $j=0;$i<$arrlength;$i++,$j=$j+2)
   {
       // Special case: If the Number of Words is only 1, need to generate the password
       //  differently - only want one key
       if ($arrlength == 1)
       {
          $password[$j] = $words[$rand_keys];
       }
       else
       {
          // For all other cases (generating more than 1 word for the password), pull the 
          // words from words array via the random keys
          $password[$j] = $words[$rand_keys[$i]];
       }

       // If we are not at the end of the array
       if ($i < $arrlength-1)
       {
          // And if the Include a Number checkbox is selected
          if (isset($_GET['passNumber']))
          {
             // Generate a random digit
             $password[$j+1] = rand(0,9);
          }
          else
          {
             // Otherwise, stick a dash between the words
             $password[$j+1] = "-";
          }
       }

       // If we are at the last entry, do some special stuff
       else if ($i == $arrlength-1)
       {
          // If the user wants to add a symbol at the end of the password
          //   Do it now
          if (isset($_GET['passSymbol']))
          {
             // Generate a random key to the symbols array
             $sym_key = array_rand($symbols);

             // Set the last entry in the password array to this symbol
             $password[$j+1] = $symbols[$sym_key];
          }
          else
          {
             // Otherwise, either generate one last random digit if the
             //   Include a Number checkbox was selected
             if (isset($_GET['passNumber']))
             {
                $password[$j+1] = rand(0,9);
             }
             else
             {
                // Or add a trailing space (could probably have done nothing here)
                $password[$j+1] = " ";
             }

          } // end ... else

       } // end ... else if ($i == $arrlength-1)

   }  // end ... for loop

}  // end .... if

else
{
   // If get to this part of the code, the user did not enter a number between 1 and 20
   //  Tell the user that they did something wrong

   if (isset($_GET['numWords']))
   {

      $arrlength = 4;

      $password[0] = "Error ";
      $password[1] = "with ";
      $password[2] = "the ";
      $password[3] = "Number ";
      $password[4] = "of ";
      $password[5] = "Words ";
      $password[6] = "entered";
      $password[7] = " ";
      $password[8] = " ";
      $password[9] = " ";
      $password[10] = " ";

   }  // end ... if

}  // end ... else


?>

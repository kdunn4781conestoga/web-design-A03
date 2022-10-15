/*
* FILE			: Program.cs
* PROJECT		: Assignment 3
* PROGRAMMER	: Kyle Dunn
* FIRST VERSION : 2022-10-13
* DESCRIPTION	: This program uses CGI to display an animal 
*                 from what was sent through the GET request
*/

using System;
using System.Collections;
using System.Collections.Generic;
using System.Diagnostics;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CGI_Zoo
{
    internal class Program
    {
        static void Main(string[] args)
        {
            string data, username, animal;

            // Start of html page
            Console.Write("Content-type:text/html\n\n");
            Console.Write("<html><head>");
            Console.Write("<title>The Zoo</title>");
            Console.Write("<style>img { float: left; padding-right: 10px;</style>");
            Console.Write("</title></head>");

            Console.Write("<body>");

            data = Environment.GetEnvironmentVariable("QUERY_STRING");

            // Determines if there was data sent
            if (data == null || data.Trim().Length == 0)
            {
                Console.Write("<p>Incorrect data inputted</p>");
            }
            else
            {
                // Splits query string by '&'
                string[] dataSplit = data.Split('&');

                // Grabs the two values sent via the query string
                username = dataSplit[0].Replace("username=", "");
                animal = dataSplit[1].Replace("animal=", "");

                // Checks if the two values were included in the query string
                if (username == null || data.Trim().Length == 0)
                {
                    Console.Write("<p>Incorrect data inputted</p>");
                    return;
                }

                // Figures out the path that the executable is running in
                string path = Environment.GetEnvironmentVariable("PATH_TRANSLATED");
                string scriptName = Environment.GetEnvironmentVariable("SCRIPT_NAME").Replace("/", @"\");

                string textPath = path + scriptName.Substring(0, scriptName.LastIndexOf('\\'));

                // Determines the path for the files depending on the animal type
                string animalImgLoc = null;
                string animalTextLoc = null;
                switch (animal)
                {
                    case "dolphin":
                        animalImgLoc = @".\theZoo\dolphin.jpg";
                        animalTextLoc = $"{textPath}\\theZoo\\dolphin.txt";
                        break;
                    case "giraffe":
                        animalImgLoc = @".\theZoo\giraffe.jpg";
                        animalTextLoc = $"{textPath}\\theZoo\\giraffe.txt";
                        break;
                    case "lion":
                        animalImgLoc = @".\theZoo\lion.jpg";
                        animalTextLoc = $"{textPath}\\theZoo\\lion.txt";
                        break;
                    case "monkey":
                        animalImgLoc = @".\theZoo\monkey.jpg";
                        animalTextLoc = $"{textPath}\\theZoo\\monkey.txt";
                        break;
                    case "polarBear":
                        animalImgLoc = @".\theZoo\polarBear.jpg";
                        animalTextLoc = $"{textPath}\\theZoo\\polarBear.txt";
                        break;
                    case "zebra":
                        animalImgLoc = @".\theZoo\zebra.jpg";
                        animalTextLoc = $"{textPath}\\theZoo\\zebra.txt";
                        break;
                };

                if (animalImgLoc == null || animalTextLoc == null)
                {
                    Console.Write("<p>Incorrect data supplied</p>");
                    return;
                }

                Console.Write($"<h2>Hi, {username}, your animal is a {animal}.</h2><br/><br/>");

                Console.Write("<div>");
                Console.Write($"<img src=\"{animalImgLoc}\" alt=\"Image not found\" width=\"400\" height=\"400\"/>");

                // Reads the text file
                string animalText = File.ReadAllText($"{animalTextLoc}");

                Console.Write($"{animalText}<br>");

                Console.Write("</div>");
            }
            Console.Write("</body></html>");
        }
    }
}

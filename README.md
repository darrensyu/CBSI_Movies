# CBSI_Movies
CBSI Movies Interview Project

##Initial Prompt:
Three hollywood movie production companies, each produces 5-10 movies a year, 10% of the movies fail financially, actors are paid base amount plus rev share. Assume 4 core actors per movie. Produce a display that shows actors, actor revenue, movie production companies revenue, losses for each and a form that allows a user to enter an actor and map to movie and base pay .

##Assumptions:
During the course of this project I made a few assumptions in regards to how the information should be interpreted and how certain elements of the database relate to each other.

Assumption #1:
The prompt says that there are 4 core actors per movie, so I assumed that there would only be 4 actors that would be included in each movie's information. With that in mind, I created separate fields for each actor's name, base payment, and revenue shares per movie. I also used SWITCH statements in order to properly calculate an actor's revenue regardless of which position the actor had been entered into the database (i.e. regardless of whether an actor was put in the actor1 position or the actor4 position there is no indication of order of the actors based on any criteria).

Assumption #2:
The prompt talks about movie production companies' revenue and losses, but in order to properly calculate losses, I would need to know production costs for the movie. Therefore, I took both into account and created both a "Company Cost" column and a "Company Profit/Loss" column on the home page display.

##Tools:
For this particular project I used:
Text Editor: Atom
Web Server: XAMPP
Browser: Google Chrome

##Usage:
The first page you are directed to is "index.php" (herein referred to as the Home Page). The Home Page is where I've decided to place the display of information asked for from the prompt. On the Home Page,there are 2 tables. The first table contains the information about all the current actors within the database and their respective calculated revenue. The revenue of each actor is a sum of all their base payments and revenue share payouts for each movie they were a part of. The second table contains the information about the 3 movie production companies and their respective revenue, costs, and profits/losses. There are also links to the other pages I created for this project and clicking on them will navigate you to each respective page. 

The second page you can navigate to is the "Actor Lookup" page. On this page is a simple text field that prompts the user to enter the full name of the actor the user wishes to search for. Upon entering an actor that is within the database, the screen will print the various financial information about each of the movies the actor has starred in. If the user enters an actor that is not within the database, the screen will notify the user that the searched actor does not exist within the database.

The last page you can navigate to is the "Adding a Movie Entry" page. On this page are multiple text fields that allow the user to input a new movie entry upon filling out every associated field within the page. For the actors that do not already exist in the database, the code will dynamically add them to the Actors table and print a message stating that such an action has been taken.

##Potential Additional Features:
Given that this project was relatively open-ended, I did consider other possible features and information that would be beneficially to any user utilizing this particular web app. Some ideas that I thought of during the development of this web app are:

1. Gender specification (actor vs. actress)
2. Movie Lookup option: A user is shown a similar page to that of the "Actor Lookup" page and can search for pertinent data about specific movies through the user interface.
3. Sorting movies by profits/losses: This allows the user to identify the most profitable movies and also movies that had failed financially.
4. Sorting actors/actresses by revenue: This allows the user to identify the actors/actresses that have made the most money in their career.

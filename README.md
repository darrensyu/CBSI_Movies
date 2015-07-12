# CBSI_Movies
CBSI Movies Interview Project

##Initial Prompt:


##Assumptions:
During the course of this project I made a few assumptions in regards to how the information and how certain elements of the database related to each other.

Assumption #1:
The prompt says that there are 4 core actors per movie, so I assumed that there would only be 4 actors that would be included in each movie's information. With that in mind, I created separate fields for each actor's name, base payment, and revenue shares. I also used SWITCH statements in order to properly calculate an actor's revenue regardless which position the actor had been entered into the database (i.e. regardless of whether an actor was put in the actor1 position or the actor4 position).

Assumption #2:
The prompt talks about movie production companies revenue and losses, but in order to properly calculate losses, I would need to know production costs for the movie. Therefore, I took both into account and created both a "Company Cost" column and a "Company Profit/Loss" column in the home page display.

##Potential Additional Features:
Given that this project was relatively open-ended, I did consider other possible features and information that would be beneficially to any user utilizing this particular web app. Some ideas that I thought of during the development of this web app are:

1. Gender specification (actor vs. actress)
2. Movie Lookup option: A user can be shown a similar UI to that of the Actor Lookup page and be able to see pertinent data about specific movies.

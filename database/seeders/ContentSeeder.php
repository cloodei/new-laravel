<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;
use App\Models\Genre;

class ContentSeeder extends Seeder
{
    public function run()
    {
        $genres = Genre::all();
        Content::insert([
            [   
                'title' => 'Pulp Fiction',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster, and his wife intertwine in four tales of violence and redemption.',
                'image' => Storage::url('images/Pulp Fiction.jpg'),
                'trailer' => Storage::url('videos/Pulp Fiction.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 154,
                'activate' => 1,
                'created_at' => '1994-10-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his empire to his reluctant son.',
                'image' => Storage::url('images/The Godfather.jpg'),
                'trailer' => Storage::url('videos/The GodFather.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 175,
                'activate' => 1,
                'created_at' => '1972-03-24',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through dream-sharing technology is given the task of planting an idea into the mind of a CEO.',
                'image' => Storage::url('images/Inception.jpg'),
                'trailer' => Storage::url('videos/Inception.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 1,
                'duration' => 148,
                'activate' => 1,
                'created_at' => '2010-08-06',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   
                'title' => 'Batman: Begins',
                'description' => 'After training with his mentor, Batman begins his war on crime to free Gotham City from corruption.',
                'image' => Storage::url('images/Batman Begins.jpg'),
                'trailer' => Storage::url('videos/Batman Begins.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3,
                'season_id' => 1,
                'duration' => 140,
                'activate' => 1,
                'created_at' => '2005-06-15',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [    
                'title' => 'Breaking Bad',
                'description' => 'Season 1 of Breaking Bad follows Walter White’s descent into the drug trade after a terminal diagnosis.',
                'image' => Storage::url('images/Breaking Bad.jpg'),
                'trailer' => Storage::url('videos/Breaking Bad.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 50, // Per episode if it's a series
                'activate' => 1,
                'created_at' => '2008-01-20',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [    
                'title' => 'Breaking Bad',
                'description' => 'Season 2 of Breaking Bad escalates the tension as Walter and Jesse face the consequences of their actions.',
                'image' => Storage::url('images/Breaking Bad.jpg'),
                'trailer' => Storage::url('videos/Breaking Bad.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 2,
                'duration' => 50, // Per episode if it's a series
                'activate' => 1,
                'created_at' => '2008-01-20',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [    
                'title' => 'Breaking Bad',
                'description' => 'Season 3 of Breaking Bad introduces new characters and intensifies the conflict in the drug trade.',
                'image' => Storage::url('images/Breaking Bad.jpg'),
                'trailer' => Storage::url('videos/Breaking Bad.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 3,
                'duration' => 50, // Per episode if it's a series
                'activate' => 1,
                'created_at' => '2008-01-20',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [    
 
                'title' => 'Breaking Bad',
                'description' => 'Season 4 of Breaking Bad brings Walter and Gus Fring into a deadly showdown.',
                'image' => Storage::url('images/Breaking Bad.jpg'),
                'trailer' => Storage::url('videos/Breaking Bad.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 4,
                'duration' => 50, // Per episode if it's a series
                'activate' => 1,
                'created_at' => '2008-01-20',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [    

                'title' => 'Breaking Bad',
                'description' => 'Season 5 of Breaking Bad concludes Walter’s transformation and the ramifications of his choices.',
                'image' => Storage::url('images/Breaking Bad.jpg'),
                'trailer' => Storage::url('videos/Breaking Bad.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 5,
                'duration' => 50, // Per episode if it's a series
                'activate' => 1,
                'created_at' => '2008-01-20',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   
    
                'title' => 'The Dark Knight',
                'description' => 'The Joker creates chaos and terror in Gotham City.',
                'image' => Storage::url('images/The Dark Knight.jpg'),
                'trailer' => Storage::url('videos/The Dark Knight.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 152,
                'activate' => 1,
                'created_at' => '2008-07-18',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   
   
                'title' => 'The Dark Knight Rises',
                'description' => 'Bane attacks Gotham City, forcing Bruce Wayne to don the Batman cape once again.',
                'image' => Storage::url('images/The Dark Knight Rises.jpg'),
                'trailer' => Storage::url('videos/The Dark Knight Rises.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 164,
                'activate' => 1,
                'created_at' => '2012-07-27',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   
    
                'title' => 'Band of Brothers',
                'description' => "The series dramatizes the history of 'Easy' Company, 2nd Battalion, 506th Parachute Infantry Regiment of the 101st Airborne Division.",
                'image' => Storage::url('images/Band of Brothers.jpg'),
                'trailer' => Storage::url('videos/Band of Brothers.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 1,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2001-09-09',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   
        
                'title' => 'Game of Thrones',
                'description' => 'Season 1 of Game of Thrones introduces the Stark family and the dangerous politics of Westeros.',
                'image' => Storage::url('images/Game of Thrones.webp'),
                'trailer' => Storage::url('videos/Game of Thrones.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 1,
                'duration' => 57,
                'activate' => 1,
                'created_at' => '2011-4-17',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   
   
                'title' => 'Game of Thrones',
                'description' => 'Season 2 of Game of Thrones sees the Stark family facing new challenges as war breaks out across the realm.',
                'image' => Storage::url('images/Game of Thrones.webp'),
                'trailer' => Storage::url('videos/Game of Thrones.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 2,
                'duration' => 57,
                'activate' => 1,
                'created_at' => '2011-4-17',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [    
         
                'title' => 'Game of Thrones',
                'description' => 'Season 3 of Game of Thrones continues the brutal fight for power, culminating in the shocking Red Wedding.',
                'image' => Storage::url('images/Game of Thrones.webp'),
                'trailer' => Storage::url('videos/Game of Thrones.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 3,
                'duration' => 57,
                'activate' => 1,
                'created_at' => '2011-4-17',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => 'Game of Thrones',
                'description' => 'Season 4 of Game of Thrones deals with the aftermath of the Red Wedding and the continuing battle for the Iron Throne.',
                'image' => Storage::url('images/Game of Thrones.webp'),
                'trailer' => Storage::url('videos/Game of Thrones.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 4,
                'duration' => 57,
                'activate' => 1,
                'created_at' => '2011-4-17',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [     
      
                'title' => 'Game of Thrones',
                'description' => 'Season 5 of Game of Thrones introduces new characters and the threat of the White Walkers as tensions rise in Westeros.',
                'image' => Storage::url('images/Game of Thrones.webp'),
                'trailer' => Storage::url('videos/Game of Thrones.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 5,
                'duration' => 57,
                'activate' => 1,
                'created_at' => '2011-4-17',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
           
                'title' => 'Game of Thrones',
                'description' => 'Season 6 of Game of Thrones features major revelations and the emergence of new threats as the battle for the realm continues.',
                'image' => Storage::url('images/Game of Thrones.webp'),
                'trailer' => Storage::url('videos/Game of Thrones.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 6,
                'duration' => 57,
                'activate' => 1,
                'created_at' => '2011-4-17',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   

                'title' => 'Game of Thrones',
                'description' => 'Season 7 of Game of Thrones leads to the final conflicts as the fight for power reaches its climax.',
                'image' => Storage::url('images/Game of Thrones.webp'),
                'trailer' => Storage::url('videos/Game of Thrones.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 7,
                'duration' => 57,
                'activate' => 1,
                'created_at' => '2011-4-17',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [   

                'title' => 'Game of Thrones',
                'description' => 'Season 8 of Game of Thrones concludes the epic saga with intense battles and the fate of the Seven Kingdoms.',
                'image' => Storage::url('images/Game of Thrones.webp'),
                'trailer' => Storage::url('videos/Game of Thrones.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2,
                'season_id' => 8,
                'duration' => 57,
                'activate' => 1,
                'created_at' => '2011-4-17',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [ 
 
                'title' => 'Dexter',
                'description' => 'Season 1 of Dexter focuses on the beginning of Dexter Morgan’s journey as a blood spatter analyst for the Miami Metro Police Department.',
                'image' => Storage::url('images/Dexter.webp'),
                'trailer' => Storage::url('videos/Dexter.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 1,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2006-10-01',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [ 
       
                'title' => 'Dexter',
                'description' => 'Season 2 of Dexter delves into Dexter’s personal struggles while the Miami Metro investigates a series of murders.',
                'image' => Storage::url('images/Dexter.webp'),
                'trailer' => Storage::url('videos/Dexter.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 2,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2006-10-01',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [ 
    
                'title' => 'Dexter',
                'description' => 'Season 3 of Dexter deals with Dexter confronting new challenges as a serial killer while maintaining his normal life.',
                'image' => Storage::url('images/Dexter.webp'),
                'trailer' => Storage::url('videos/Dexter.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 3,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2006-10-01',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [ 
      
                'title' => 'Dexter',
                'description' => 'Season 4 of Dexter features the infamous Trinity Killer and the impact he has on Dexter’s life.',
                'image' => Storage::url('images/Dexter.webp'),
                'trailer' => Storage::url('videos/Dexter.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 4,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2006-10-01',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [ 

                'title' => 'Dexter',
                'description' => 'Season 5 of Dexter follows Dexter’s attempts to rebuild his life after the events of the previous season.',
                'image' => Storage::url('images/Dexter.webp'),
                'trailer' => Storage::url('videos/Dexter.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 5,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2006-10-01',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [ 
   
                'title' => 'Dexter',
                'description' => 'Season 6 of Dexter introduces the Doomsday Killer and explores Dexter’s struggle with faith.',
                'image' => Storage::url('images/Dexter.webp'),
                'trailer' => Storage::url('videos/Dexter.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 6,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2006-10-01',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [ 
  
                'title' => 'Dexter',
                'description' => 'Season 7 of Dexter deals with the fallout of Debra discovering Dexter’s secret.',
                'image' => Storage::url('images/Dexter.webp'),
                'trailer' => Storage::url('videos/Dexter.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 7,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2006-10-01',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            
            [ 

                'title' => 'Dexter',
                'description' => 'Season 8 of Dexter brings his story to a dramatic conclusion as he faces the ultimate consequences of his actions.',
                'image' => Storage::url('images/Dexter.webp'),
                'trailer' => Storage::url('videos/Dexter.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2,
                'season_id' => 8,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2006-10-01',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],

            [
     
                'title' => 'Peaky Blinders',
                'description' => 'Season 1 of Peaky Blinders',
                'image' => Storage::url('images/Peaky Blinders.webp'),
                'trailer' => Storage::url('videos/Peaky Blinders.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1, // ID danh mục phù hợp
                'season_id' => 1, // ID thể loại phù hợp
                'duration' => 60, // Thêm thời gian nếu có
                'activate' => 1,
                'created_at' => '2013-09-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => 'Peaky Blinders',
                'description' => 'Season 2 of Peaky Blinders',
                'image' => Storage::url('images/Peaky Blinders.webp'),
                'trailer' => Storage::url('videos/Peaky Blinders.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1, // ID danh mục phù hợp
                'season_id' => 2,
                'duration' => 60, // Thêm thời gian nếu có
                'activate' => 1,
                'created_at' => '2013-09-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
 
                'title' => 'Peaky Blinders',
                'description' => 'Season 3 of Peaky Blinders',
                'image' => Storage::url('images/Peaky Blinders.webp'),
                'trailer' => Storage::url('videos/Peaky Blinders.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1, // ID danh mục phù hợp
                'season_id' => 3,
                'duration' => 60, // Thêm thời gian nếu có
                'activate' => 1,
                'created_at' => '2013-09-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Peaky Blinders',
                'description' =>  'Season 4 of Peaky Blinders',
                'image' => Storage::url('images/Peaky Blinders.webp'),
                'trailer' => Storage::url('videos/Peaky Blinders.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1, // ID danh mục phù hợp
                'season_id' => 4,
                'duration' => 60, // Thêm thời gian nếu có
                'activate' => 1,
                'created_at' => '2013-09-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Peaky Blinders',
                'description' => 'Season 5 of Peaky Blinders',
                'image' => Storage::url('images/Peaky Blinders.webp'),
                'trailer' => Storage::url('videos/Peaky Blinders.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1, // ID danh mục phù hợp
                'season_id' => 5,
                'duration' => 60, // Thêm thời gian nếu có
                'activate' => 1,
                'created_at' => '2013-09-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
 
                'title' => 'Peaky Blinders',
                'description' => 'Season 6 of Peaky Blinders',
                'image' => Storage::url('images/Peaky Blinders.webp'),
                'trailer' => Storage::url('videos/Peaky Blinders.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1, // ID danh mục phù hợp
                'season_id' => 6,
                'duration' => 60, // Thêm thời gian nếu có
                'activate' => 1,
                'created_at' => '2013-09-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Friends',
                'description' => 'Season 1 of Friends introduces the group of friends living in New York City.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Friends',
                'description' =>'Season 2 of Friends explores the evolving relationships among the group.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' =>2,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
      
                'title' => 'Friends',
                'description' => 'Season 3 of Friends brings more comedic situations and romance.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 3,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Friends',
                'description' => 'Season 4 of Friends features new dynamics and guest appearances.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 4,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Friends',
                'description' => 'Season 5 of Friends continues the group’s ups and downs in their personal lives.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 5,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Friends',
                'description' => 'Season 6 of Friends features pivotal moments and character development.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 6,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Friends',
                'description' => 'Season 7 of Friends explores new relationships and the complexities of love.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' =>7 ,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Friends',
                'description' => 'Season 8 of Friends brings challenges as the characters grow older.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 8,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Friends',
                'description' => 'Season 9 of Friends focuses on the characters’ careers and family life.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 9,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Friends',
                'description' => 'Season 10 of Friends concludes the series with heartfelt goodbyes.',
                'image' => Storage::url('images/Friends.webp'),
                'trailer' => Storage::url('videos/Friends.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 10,
                'duration' => 62,
                'activate' => 1,
                'created_at' => '1994-09-22',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'The Sopranos',
                'description' => 'Season 1 of The Sopranos introduces Tony Soprano, a mob boss trying to balance his family life with his role in organized crime.',
                'image' => Storage::url('images/The Sopranos.webp'),
                'trailer' => Storage::url('videos/The Sopranos.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 45,
                'activate' => 1,
                'created_at' => '1999-01-10' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'The Sopranos',
                'description' => 'Season 2 of The Sopranos explores Tony’s increasing struggles with his personal and professional life as he navigates the complexities of mob politics.',
                'image' => Storage::url('images/The Sopranos.webp'),
                'trailer' => Storage::url('videos/The Sopranos.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 2 ,
                'duration' => 45,
                'activate' => 1,
                'created_at' => '1999-01-10' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'The Sopranos',
                'description' => 'Season 3 of The Sopranos focuses on the power struggles within the mob and Tony’s relationships with his family and associates.',
                'image' => Storage::url('images/The Sopranos.webp'),
                'trailer' => Storage::url('videos/The Sopranos.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' =>3,
                'duration' => 45,
                'activate' => 1,
                'created_at' => '1999-01-10' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'The Sopranos',
                'description' => 'Season 4 of The Sopranos highlights Tony’s expanding empire and the challenges he faces from both enemies and allies.',
                'image' => Storage::url('images/The Sopranos.webp'),
                'trailer' => Storage::url('videos/The Sopranos.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 4,
                'duration' => 45,
                'activate' => 1,
                'created_at' => '1999-01-10' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The Sopranos',
                'description' => 'Season 5 of The Sopranos shows Tony dealing with the consequences of his actions and the complexities of loyalty within the mob.',
                'image' => Storage::url('images/The Sopranos.webp'),
                'trailer' => Storage::url('videos/The Sopranos.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' =>5 ,
                'duration' => 45,
                'activate' => 1,
                'created_at' => '1999-01-10' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'The Sopranos',
                'description' =>  'Season 6 of The Sopranos brings resolutions to Tony’s story while exploring the psychological impact of his lifestyle.',
                'image' => Storage::url('images/The Sopranos.webp'),
                'trailer' => Storage::url('videos/The Sopranos.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 6,
                'duration' => 45,
                'activate' => 1,
                'created_at' => '1999-01-10' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Sherlock',
                'description' => 'Season 1 of Sherlock',
                'image' => Storage::url('images/Sherlock.webp'),
                'trailer' => Storage::url('videos/Sherlock.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 50,
                'activate' => 1,
                'created_at' => '2010-07-25' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => 'Sherlock',
                'description' => 'Season 2 of Sherlock',
                'image' => Storage::url('images/Sherlock.webp'),
                'trailer' => Storage::url('videos/Sherlock.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 2,
                'duration' => 50,
                'activate' => 1,
                'created_at' => '2010-07-25' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
       
                'title' => 'Sherlock',
                'description' => 'Season 3 of Sherlock',
                'image' => Storage::url('images/Sherlock.webp'),
                'trailer' => Storage::url('videos/Sherlock.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 3,
                'duration' => 50,
                'activate' => 1,
                'created_at' => '2010-07-25' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
      
                'title' => 'Sherlock',
                'description' => 'Season 4 of Sherlock',
                'image' => Storage::url('images/Sherlock.webp'),
                'trailer' => Storage::url('videos/Sherlock.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 4,
                'duration' => 50,
                'activate' => 1,
                'created_at' => '2010-07-25' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'No Time to Die',
                'description' => "James Bond has left active service. His peace is short-lived when Felix Leiter, an old friend from the CIA, turns up asking for help.",
                'image' => Storage::url('images/No time to die.jpg'),
                'trailer' => Storage::url('videos/No time to die.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 163, // Thêm độ dài phim nếu có
                'activate' => 1,
                'created_at' => '2020-09-30' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
        
                'title' => 'Prison Break',
                'description' => 'Season 1 of Prison Break follows Michael Scofield as he plans to break his brother out of prison.',
                'image' => Storage::url('images/Prison Break.webp'),
                'trailer' => Storage::url('videos/Prison Break.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-08-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Prison Break',
                'description' => 'Season 2 of Prison Break sees the fugitives on the run, facing new dangers as they seek freedom.',
                'image' => Storage::url('images/Prison Break.webp'),
                'trailer' => Storage::url('videos/Prison Break.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 2,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-08-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
      
                'title' => 'Prison Break',
                'description' => 'Season 3 of Prison Break takes place in a Panamanian prison, where new challenges arise for Michael and his allies.',
                'image' => Storage::url('images/Prison Break.webp'),
                'trailer' => Storage::url('videos/Prison Break.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 3,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-08-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Prison Break',
                'description' => 'Season 4 of Prison Break involves a new mission to take down a secret organization.',
                'image' => Storage::url('images/Prison Break.webp'),
                'trailer' => Storage::url('videos/Prison Break.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 4,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-08-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'Prison Break',
                'description' => 'Season 5 of Prison Break sees Michael’s return and the reunion with his brother.',
                'image' => Storage::url('images/Prison Break.webp'),
                'trailer' => Storage::url('videos/Prison Break.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 5,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-08-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
     
                'title' => 'The Haunting of Hill House',
                'description' => "The plot alternates between two timelines, following five adult siblings whose paranormal experiences at Hill House continue to haunt them.",
                'image' => Storage::url('images/The Haunting Of Hill House.webp'),
                'trailer' => Storage::url('videos/The Haunting Of Hill House.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2018-10-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
 
                'title' => 'How I Met Your Mother',
                'description' => 'Season 1 of How I Met Your Mother introduces Ted and his friends.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
      
                'title' => 'How I Met Your Mother',
                'description' => 'Season 2 of How I Met Your Mother continues the story of Ted and his romantic pursuits.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 2,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'How I Met Your Mother',
                'description' => 'Season 3 of How I Met Your Mother brings significant developments for all characters.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 3,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'How I Met Your Mother',
                'description' => 'Season 4 of How I Met Your Mother explores new relationships and challenges.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 4,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'How I Met Your Mother',
                'description' => 'Season 5 of How I Met Your Mother introduces changes in dynamics among friends.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 5,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'How I Met Your Mother',
                'description' =>  'Season 6 of How I Met Your Mother dives deeper into personal stories and growth.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 6,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
               
                'title' => 'How I Met Your Mother',
                'description' => 'Season 7 of How I Met Your Mother continues with twists and turns in relationships.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 7,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
 
                'title' => 'How I Met Your Mother',
                'description' => 'Season 8 of How I Met Your Mother sets the stage for the final season.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 8,
                'duration' => 60,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'How I Met Your Mother',
                'description' => 'Season 9 of How I Met Your Mother wraps up the series with Ted\'s journey to find love.',
                'image' => Storage::url('images/How I met your Mother.webp'),
                'trailer' => Storage::url('videos/How I met your Mother.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 9,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2005-10-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'The X-Files',
                'description' => 'Season 1 of The X Files introduces Mulder and Scully as they investigate unexplained phenomena.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The X-Files',
                'description' => 'Season 2 of The X Files continues the agents’ investigation into paranormal events and conspiracies.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 2,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The X-Files',
                'description' => 'Season 3 of The X Files expands on the conspiracy theories while Mulder and Scully face new threats.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 3,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
      
                'title' => 'The X-Files',
                'description' => 'Season 4 of The X Files continues to delve deeper into the mysteries surrounding the X-Files and their personal lives.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 4,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The X-Files',
                'description' => 'Season 5 of The X Files explores the continuing fight against alien conspiracies and personal dilemmas for Mulder and Scully.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 5,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'The X-Files',
                'description' => 'Season 6 of The X Files presents new cases while dealing with the implications of the past seasons’ revelations.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 6,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => 'The X-Files',
                'description' => 'Season 7 of The X Files focuses on the aftermath of the conspiracy and its impact on Mulder and Scully’s lives.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 7,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'The X-Files',
                'description' => 'Season 8 of The X Files introduces new characters and explores the legacy of the X-Files.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 8,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The X-Files',
                'description' => 'Season 9 of The X Files features significant changes and the ongoing quest for truth.',
                'image' => Storage::url('images/The XFiles.webp'),
                'trailer' => Storage::url('videos/The XFiles.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 9,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '1993-10-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],

            [
                

                'title' => 'Fargo',
                'description' => "Fargo is a reality-based crime drama set in Minnesota in 1987, revolving around a car salesman in debt who hires two thugs to kidnap his wife.",
                'image' => Storage::url('images/Fargo.jpg'),
                'trailer' => Storage::url('videos/Fargo.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2014-02-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
           
            [              
        
                'title' => 'The Vietnam War',
                'description' => "Visceral and immersive, the series explores the human dimensions of the war through revelatory testimony of nearly 80 witnesses from all sides.",
                'image' => Storage::url('images/The Vietnam War.jpg') ,
                'trailer' => Storage::url('/videos/The Vietnam War.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2017-03-15',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Blindspot',
                'description' => 'Season 1 of Blindspot',
                'image' => Storage::url('images/Blindspot.jpg'),
                'trailer' => Storage::url('videos/Blindspot.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // Replace with actual category ID for Blindspot
                'season_id' => 1, // Replace with actual season ID if needed
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2015-06-25',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Blindspot',
                'description' => 'Season 2 of Blindspot',
                'image' => Storage::url('images/Blindspot.jpg'),
                'trailer' => Storage::url('/videos/Blindspot.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 2, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2015-06-25',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Blindspot',
                'description' => 'Season 3 of Blindspot',
                'image' => Storage::url('images/Blindspot.jpg'),
                'trailer' => Storage::url('/videos/Blindspot.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 3, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2015-06-25',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Blindspot',
                'description' => 'Season 4 of Blindspot',
                'image' => Storage::url('images/Blindspot.jpg'),
                'trailer' => Storage::url('/videos/Blindspot.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 4, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2015-06-25',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Blindspot',
                'description' => 'Season 5 of Blindspot',
                'image' => Storage::url('images/Blindspot.jpg'),
                'trailer' => Storage::url('/videos/Blindspot.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 5, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2015-06-25',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],         
            [
                'title' => '24',
                'description' => 'Season 1 of 24',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => '24',
                'description' => 'Season 2 of 24...',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' => 2, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => '24',
                'description' => 'Season 3 of 24...',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' => 3, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
 
                'title' => '24',
                'description' => 'Season 4 of 24...',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' => 4, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
      
                'title' => '24',
                'description' => 'Season 5 of 24...',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' =>5, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => '24',
                'description' => 'Season 6 of 24...',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' => 6, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => '24',
                'description' => 'Season 7 of 24...',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' => 7, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => '24',
                'description' => 'Season 8 of 24...',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' => 8, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => '24',
                'description' => '24: Live Another Day...',
                'image' => Storage::url('images/24.jpg'),
                'trailer' => Storage::url('/videos/24.mp4'),
                'content_type' => 'VIP',
                'category_id' => 3, // ID của danh mục cụ thể
                'season_id' => 9, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2001-09-29',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],

            [

                'title' => 'The Walking Dead',
                'description' => 'Season 1 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
          
                'title' => 'The Walking Dead',
                'description' =>  'Season 2 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 2, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
      
                'title' => 'The Walking Dead',
                'description' => 'Season 3 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 3, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'The Walking Dead',
                'description' => 'Season 4 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 4, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => 'The Walking Dead',
                'description' => 'Season 5 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 5, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
            
                'title' => 'The Walking Dead',
                'description' => 'Season 6 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 6, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
       
                'title' => 'The Walking Dead',
                'description' => 'Season 7 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 7, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
       
                'title' => 'The Walking Dead',
                'description' => 'Season 8 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 8, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The Walking Dead',
                'description' => 'Season 9 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 9, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The Walking Dead',
                'description' => 'Season 10 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 10, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => 'The Walking Dead',
                'description' => 'Season 11 of The Walking Dead...',
                'image' => Storage::url('images/The Walking Dead.jpg'),
                'trailer' => Storage::url('/videos/The Walking Dead.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 11, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2010-04-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],

            [
    
                'title' => 'The Big Bang Theory',
                'description' => 'Season 1 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'The Big Bang Theory',
                'description' => 'Season 2 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 2, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'The Big Bang Theory',
                'description' =>'Season 3 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 3, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
        
                'title' => 'The Big Bang Theory',
                'description' => 'Season 4 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 4, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The Big Bang Theory',
                'description' => 'Season 5 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 5, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'The Big Bang Theory',
                'description' => 'Season 6 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 6, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'The Big Bang Theory',
                'description' => 'Season 7 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 7, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'The Big Bang Theory',
                'description' => 'Season 8 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 8, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
       
                'title' => 'The Big Bang Theory',
                'description' => 'Season 9 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 9, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'The Big Bang Theory',
                'description' => 'Season 10 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 10, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The Big Bang Theory',
                'description' => 'Season 11 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 11, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'The Big Bang Theory',
                'description' => 'Season 12 of The Big Bang Theory...',
                'image' => Storage::url('images/The Big Bang Theory.jpg'),
                'trailer' => Storage::url('/videos/The Big Bang Theory.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 12, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2007-12-28' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],

            [
   
                'title' => 'Homeland',
                'description' => 'Season 1 of Homeland...',
                'image' => Storage::url('images/Homeland.jpg'),
                'trailer' => Storage::url('/videos/Homeland.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2011-12-21' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'Homeland',
                'description' => 'Season 2 of Homeland...',
                'image' => Storage::url('images/Homeland.jpg'),
                'trailer' => Storage::url('/videos/Homeland.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 2, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2011-12-21' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Homeland',
                'description' => 'Season 3 of Homeland...',
                'image' => Storage::url('images/Homeland.jpg'),
                'trailer' => Storage::url('/videos/Homeland.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 3, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2011-12-21' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'Homeland',
                'description' => 'Season 4 of Homeland...',
                'image' => Storage::url('images/Homeland.jpg'),
                'trailer' => Storage::url('/videos/Homeland.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 4, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2011-12-21' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'Homeland',
                'description' => 'Season 5 of Homeland...',
                'image' => Storage::url('images/Homeland.jpg'),
                'trailer' => Storage::url('/videos/Homeland.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 5, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2011-12-21' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
  
                'title' => 'Homeland',
                'description' => 'Season 6 of Homeland...',
                'image' => Storage::url('images/Homeland.jpg'),
                'trailer' => Storage::url('/videos/Homeland.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 6, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2011-12-21' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Homeland',
                'description' => 'Season 7 of Homeland...',
                'image' => Storage::url('images/Homeland.jpg'),
                'trailer' => Storage::url('/videos/Homeland.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 7, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2011-12-21' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Homeland',
                'description' => 'Season 8 of Homeland...',
                'image' => Storage::url('images/Homeland.jpg'),
                'trailer' => Storage::url('/videos/Homeland.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 8, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2011-12-21' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],

            [
 
                'title' => 'The Matrix',
                'description' => 'A computer hacker learns about the true nature of reality and his role in the war against its controllers.',
                'image' => Storage::url('images/The Matrix.jpg'),
                'trailer' => Storage::url('/videos/The Matrix.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 136, // Thời gian chạy của phim là 136 phút
                'activate' => 1,
                'created_at' => '1999-05-05',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => "Schindler's List",
                'description' => 'The true story of Oskar Schindler, who saved more than a thousand Jewish refugees from the Holocaust by employing them in his factories.',
                'image' => Storage::url('images/Schindlers_List.jpg'),
                'trailer' => Storage::url('videos/Schindlers_List.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 195,
                'activate' => 1,
                'created_at' => '1993-06-07',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Parasite',
                'description' => 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.',
                'image' => Storage::url('images/Parasite.jpg'),
                'trailer' => Storage::url('videos/Parasite.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 132,
                'activate' => 1,
                'created_at' => '2019-08-09',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'Furiosa: A Mad Max Saga',
                'description' => 'Snatched from the Green Place of Many Mothers, young Furiosa falls into the hands of a great biker horde led by the warlord Dementus.',
                'image' => Storage::url('images/Furiosa.jpg'),
                'trailer' => Storage::url('videos/Furiosa.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 55,
                'activate' => 1,
                'created_at' => '2024-01-10',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
                'title' => 'The Shawshank Redemption',
                'description' => 'Two imprisoned men bond over the years, finding solace and eventual redemption through acts of common decency.',
                'image' => Storage::url('images/The_Shawshank_Redemption.jpg'),
                'trailer' => Storage::url('videos/The_Shawshank_Redemption.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1,
                'season_id' => 1,
                'duration' => 142,
                'activate' => 1,
                'created_at' => '1994-06-16',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            // Add more entries following this pattern
            [
     
                'title' => 'Godzilla x Kong: The New Empire',
                'description' => 'Godzilla and Kong face off as humanity uncovers their origins and mysteries on Skull Island.',
                'image' => Storage::url('images/Godzilla x Kong _ The New Empire.jpg'),
                'trailer' => Storage::url('/videos/Godzilla x Kong _ The New Empire.mp4'),
                'content_type' => 'VIP',
                'category_id' => 1, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 120, // Thời gian chạy của phim là 120 phút
                'activate' => 1,
                'created_at' => '2024-12-13',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
 
                'title' => 'Gladiator',
                'description' => 'A former Roman General sets out to exact vengeance against the corrupt emperor who murdered his family and sent him into slavery.',
                'image' => Storage::url('images/Gladiator.jpg'),
                'trailer' => Storage::url('/videos/Gladiator.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 155, // Thời gian chạy của phim là 155 phút
                'activate' => 1,
                'created_at' => '2000-11-11',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Titanic',
                'description' => 'A young aristocrat falls in love with a kind but poor artist aboard the ill-fated Titanic.',
                'image' => Storage::url('images/Titanic.jpg'),
                'trailer' => Storage::url('/videos/Titanic.mp4'),
                'content_type' => 'Regular',
                'category_id' => 1, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 195, // Thời gian chạy của phim là 195 phút
                'activate' => 1,
                'created_at' => '1997-05-19' ,
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
     
                'title' => 'Kungfu Panda',
                'description' => "It's the story about a lazy, irreverent slacker panda, named Po, who is the biggest fan of Kung Fu around.",
                'image' => Storage::url('images/Kungfu Panda .jpg'),
                'trailer' => Storage::url('/videos/Kungfu Panda .mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có seaso
                'duration' => 92, // Thời gian chạy của phim là 92 phút
                'activate' => 1,
                'created_at' => '2008-02-12',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => 'Ben 10 Omniverse',
                'description' => 'Season 1 of Ben 10: Omniverse...',
                'image' => Storage::url('images/Ben 10 Omniverse.jpg'),
                'trailer' => Storage::url('/videos/Ben 10 Omniverse.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
   
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2014-12-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
     
                'title' => 'Ben 10 Omniverse',
                'description' => 'Season 2 of Ben 10: Omniverse...',
                'image' => Storage::url('images/Ben 10 Omniverse.jpg'),
                'trailer' => Storage::url('/videos/Ben 10 Omniverse.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 2, // Không có season
   
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2014-12-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                'title' => 'Ben 10 Omniverse',
                'description' => 'Season 3 of Ben 10: Omniverse...',
                'image' => Storage::url('images/Ben 10 Omniverse.jpg'),
                'trailer' => Storage::url('/videos/Ben 10 Omniverse.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 3, // Không có season
   
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2014-12-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Ben 10 Omniverse',
                'description' => 'Season 4 of Ben 10: Omniverse...',
                'image' => Storage::url('images/Ben 10 Omniverse.jpg'),
                'trailer' => Storage::url('/videos/Ben 10 Omniverse.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 4, // Không có season
   
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2014-12-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Ben 10 Omniverse',
                'description' => 'Season 5 of Ben 10: Omniverse...',
                'image' => Storage::url('images/Ben 10 Omniverse.jpg'),
                'trailer' => Storage::url('/videos/Ben 10 Omniverse.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 5, // Không có season
   
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2014-12-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
      
                'title' => 'Ben 10 Omniverse',
                'description' => 'Season 6 of Ben 10: Omniverse...',
                'image' => Storage::url('images/Ben 10 Omniverse.jpg'),
                'trailer' => Storage::url('/videos/Ben 10 Omniverse.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 6, // Không có season
   
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2014-12-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
     
                'title' => 'Ben 10 Omniverse',
                'description' => 'Season 7 of Ben 10: Omniverse...',
                'image' => Storage::url('images/Ben 10 Omniverse.jpg'),
                'trailer' => Storage::url('/videos/Ben 10 Omniverse.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 7, // Không có season
   
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2014-12-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [

                'title' => 'Ben 10 Omniverse',
                'description' => 'Season 8 of Ben 10: Omniverse...',
                'image' => Storage::url('images/Ben 10 Omniverse.jpg'),
                'trailer' => Storage::url('/videos/Ben 10 Omniverse.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 8, // Không có season
   
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2014-12-14',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],

            [

                'title' => 'Cây táo nở hoa',
                'description' => 'Bộ phim kể về cuộc sống của một gia đình với năm người con, mỗi người đều có cá tính riêng biệt. Những mâu thuẫn và xung đột giữa các thành viên tạo ra nhiều tình huống cảm động, khiến khán giả không khỏi rơi nước mắt.',
                'image' => Storage::url('images/Cây táo nở hoa.jpg'),
                'trailer' => Storage::url('/videos/Cây táo nở hoa.mp4'),
                'content_type' => 'VIP',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2021-12-13',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
    
                'title' => 'Sống chung với mẹ chồng',
                'description' => 'Câu chuyện xoay quanh cuộc sống hôn nhân của Vân (Bảo Thanh) và Thanh (Anh Dũng) khi họ sống cùng với mẹ chồng, bà Phương (NSND Lan Hương). Những mâu thuẫn và xung đột giữa mẹ chồng và nàng dâu, cùng với những vấn đề phức tạp trong mối quan hệ vợ chồng, tạo nên những tình tiết hấp dẫn và kịch tính, thu hút sự quan tâm của đông đảo người xem.',
                'image' => Storage::url('images/Sống chung với mẹ chồng.jpg'),
                'trailer' => Storage::url('/videos/Sống chung với mẹ chồng.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2017-01-07',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
 
                'title' => 'Hoa hồng trên ngực trái',
                'description' => 'Bộ phim này được coi là một trong những tác phẩm truyền hình thành công nhất khai thác chủ đề hôn nhân gia đình. Câu chuyện xoay quanh cuộc hôn nhân của Khuê và Thái, một cặp đôi gắn bó từ thời sinh viên. Tuy nhiên, sau một thời gian chung sống, mâu thuẫn giữa họ ngày càng gia tăng, đặc biệt khi một người thứ ba xuất hiện và làm rạn nứt mối quan hệ. Trong khi Khuê tìm thấy hạnh phúc mới, Thái phải đối mặt với những hậu quả của hành động của mình.',
                'image' => Storage::url('images/Hoa hồng trên ngực trái.jpg'),
                'trailer' => Storage::url('/videos/Hoa hồng trên ngực trái.mp4'),
                'content_type' => 'Regular',
                'category_id' => 2, // ID của danh mục cụ thể
                'season_id' => 1, // Không có season
                'duration' => 55, // Không xác định thời gian cho cả series
                'activate' => 1,
                'created_at' => '2019-02-21',
                'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
            ],
            [
   
                    'title' => 'Về Nhà Đi Con',
                    'description' => 'Bộ phim kể về câu chuyện cảm động của gia đình ông Sơn và ba cô con gái: Thu Huệ, Anh Thư, và Ánh Dương. Khi trưởng thành, mỗi người trong số họ đều phải đối mặt với những thử thách riêng để tìm kiếm con đường của chính mình.',
                    'image' => Storage::url('images/Về nhà đi con.jpg'),
                    'trailer' => Storage::url('/videos/Về nhà đi con.mp4'),
                    'content_type' => 'Regular',
                    'category_id' => 1, // ID của danh mục cụ thể
                    'season_id' => 1, // Không có season
                    'duration' => 55, // Không xác định thời gian
                    'activate' => 1,
                    'created_at' => '2019-02-19',
                    'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
                ],
                [
    
                    'title' => 'Quỳnh búp bê',
                    'description' => 'Là một câu chuyện đầy bi kịch về cô gái tên Quỳnh, người sống với mẹ và người cha dượng bệnh hoạn. Khi quyết định bỏ trốn lên thành phố, Quỳnh không may bị lôi kéo vào môi trường mại dâm ngầm tại nhà hàng Thiên Thai, dẫn đến một chuỗi những sự kiện đau thương trong cuộc đời cô.',
                    'image' => Storage::url('images/Quỳnh búp bê.jpg'),
                    'trailer' => Storage::url('/videos/Quỳnh búp bê.mp4'),
                    'content_type' => 'VIP',
                    'category_id' => 1, // ID của danh mục cụ thể
                    'season_id' => 1, // Không có season
                    'duration' => 55, // Không xác định thời gian
                    'activate' => 1,
                    'created_at' => '2018-02-18',
                    'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
                ],
                [
   
                    'title' => 'Gia đình mình vui bất thình lình',
                    'description' => 'Là một bộ phim truyền hình Việt Nam ra mắt năm 2023, tập trung vào cuộc sống của gia đình ông Nguyễn Văn Toại và bà Cúc cùng với ba người con trai và ba cô con dâu của họ.',
                    'image' => Storage::url('images/Gia đình mình vui bất thình lình.jpg'),
                    'trailer' => Storage::url('/videos/Gia đình mình vui bất thình lình.mp4'),
                    'content_type' => 'VIP',
                    'category_id' => 1, // ID của danh mục cụ thể
                    'season_id' => 1, // Không có season
                    'duration' => 55, // Không xác định thời gian
                    'activate' => 1,
                    'created_at' => '2023-02-23',
                    'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
                ],
                [

                    'title' => 'Kẻ ăn hồn',
                    'description' => 'Là một bộ phim điện ảnh kinh dị Việt Nam do Trần Hữu Tấn đạo diễn. Câu chuyện diễn ra tại làng Địa Ngục, một nơi đầy bí ẩn và ám ảnh với những lời nguyền rùng rợn.',
                    'image' => Storage::url('images/Kẻ ăn hồn.jpg'),
                    'trailer' => Storage::url('/videos/Kẻ ăn hồn.mp4'),
                    'content_type' => 'VIP',
                    'category_id' => 1, // ID của danh mục cụ thể
                    'season_id' => 1, // Không có season
                    'duration' => 55, // Không xác định thời gian
                    'activate' => 1,
                    'created_at' => '2023-04-08',
                    'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
                ],
                /*
                [
  
                    'title' => 'Tiếng sét trong mưa',
                    'description' => 'Tiếng Sét Trong Mưa" là một bộ phim truyền hình Việt Nam thu hút sự chú ý của khán giả, lấy bối cảnh xã hội phong kiến. Câu chuyện xoay quanh mối tình đầy bi kịch giữa Thị Bình (Nhật Kim Anh), một cô hầu hiền lành và xinh đẹp, và Khải Duy (Cao Minh Đạt), một cậu Ba điển trai.',
                    'image' => Storage::url('images/Tiếng sét trong mưa.jpg'),
                    'trailer' => Storage::url('/videos/Tiếng sét trong mưa.mp4'),
                    'content_type' => 'Regular',
                    'category_id' => 1, // ID của danh mục cụ thể
                    'season_id' => 1, // Không có season
                    'duration' => 55, // Không xác định thời gian
                    'activate' => 1,
                    'created_at' => '2019-06-26',
                    'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
                ],
                [
    
                    'title' => 'Người phán xử',
                    'description' => 'Bộ phim xoay quanh nhân vật Phan Quân (cố NSND Hoàng Dũng), một ông trùm xã hội ngầm khéo léo giấu mình dưới vẻ ngoài của một doanh nhân thành đạt. Ông đứng đầu tập đoàn Phan Thị, một tổ chức có vẻ ngoài hợp pháp nhưng thực chất là che giấu những hoạt động phi pháp. Cùng với các thuộc hạ trung thành, Phan Quân thực hiện nhiệm vụ "phán xử" những kẻ xấu và duy trì trật tự trong thế giới ngầm.',
                    'image' => Storage::url('images/Người phán xử.jpg'),
                    'trailer' => Storage::url('/videos/Người phán xử.mp4'),
                    'content_type' => 'VIP',
                    'category_id' => 1, // ID của danh mục cụ thể
                    'season_id' => 1, // Không có season
                    'duration' => 55, // Không xác định thời gian
                    'activate' => 1,
                    'created_at' => '2020-07-27',
                    'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
                ],
                [
   
                    'title' => 'Mắt biếc',
                    'description' => 'Bộ phim kể về mối tình đơn phương của Ngạn (Trần Nghĩa) dành cho Hà Lan (Trúc Anh). Ngạn vẫn luôn dành tình yêu cho Hà Lan dù cô có bỏ vùng quê lên thành phố và gặp gỡ nhiều người. Tuy nhiên, chuyện tình của Ngạn càng éo le hơn khi con gái của Hà Lan lớn lên cũng dành nhiều tình cảm cho anh.',
                    'image' => Storage::url('images/Mắt biếc.jpg'),
                    'trailer' => Storage::url('/videos/Mắt biếc.mp4'),
                    'content_type' => 'VIP',
                    'category_id' => 1, // ID của danh mục cụ thể
                    'season_id' => 1, // Không có season
                    'duration' => 55, // Không xác định thời gian
                    'activate' => 1,
                    'created_at' => '2019-09-30',
                    'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
                ],
                [
                    'id'=> 154,
                    'title' => 'Ròm',
                    'description' => 'Bộ phim lấy bối cảnh tại một khu chung cư cũ tại Sài Gòn. Nhân vật chính là cậu bé Ròm mồ côi từ khi mới 14 tuổi. Ròm (Trần Anh Khoa) làm nghề “cò đề” để sống qua ngày nhưng cậu không bao giờ từ bỏ ước mơ đỗ vào trường trung học và làm người nổi tiếng. Cuộc sống của Ròm thay đổi khi gặp một nhóm bạn trong hoàn cảnh khó khăn. Ròm và những người bạn cùng nhau đối mặt với những chật vật, thách thức của cuộc sống.',
                    'image' => Storage::url('images/Ròm.jpg'),
                    'trailer' => Storage::url('/videos/Ròm.mp4'),
                    'content_type' => 'VIP',
                    'category_id' => 1, // ID của danh mục cụ thể
                    'season_id' => 1, // Không có season
                    'duration' => 55, // Không xác định thời gian         
                    'activate' => 1,
                    'created_at' => '2019-02-19',
                    'updated_at' => now(),
                'genre_id' => $genres->first()->id, // For example, assign the first genre
                ],
                */
        ]);
    }
}
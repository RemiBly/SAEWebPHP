<?php

// Données dans l'extrait mais sous la forme d'une liste en PHP
$dataAlbum = [
    [
        'by' => 'Superdrag',
        'entryId' => 67913,
        'genre' => ['Rock', 'Punk'],
        'img' => '../static/images/Superdrag-Stereo_360_Sound.jpg',
        'parent' => 'Superdrag',
        'releaseYear' => 1998,
        'title' => 'Stereo 360 Sound',
    ],
    [
        'by' => '16 Horsepower',
        'entryId' => 10575,
        'genre' => ['Alternative country', 'neofolk'],
        'img' => '../static/images/220px-Folklore_hp.jpg',
        'parent' => '16 Horsepower',
        'releaseYear' => 2002,
        'title' => 'Folklore',
    ],
    [
        'by' => 'Ryan Adams',
        'entryId' => 10637,
        'genre' => ['Alternative country', 'country'],
        'img' => '../static/images/220px-RyanAdamsHeartbreaker.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2000,
        'title' => 'Heartbreaker',
    ],
    [
        'by' => 'Ryan Adams',
        'entryId' => 10644,
        'genre' => ['Rock', 'alternative country', 'pop rock'],
        'img' => '../static/images/220px-Ryanadamsselftitled.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2014,
        'title' => 'Ryan Adams',
    ],
    [
        'by' => 'Whiskeytown',
        'entryId' => 10660,
        'genre' => ['Alternative country'],
        'img' => '../static/images/220px-WhiskeytownPneumonia.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2001,
        'title' => 'Pneumonia',
    ],
    [
        'by' => 'Jesse Malin',
        'entryId' => 10668,
        'genre' => [],
        'img' => '../static/images/The_Fine_Art_of_Self_Destruction.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2002,
        'title' => 'The Fine Art of Self Destruction',
    ],
    [
        'by' => 'The Finger',
        'entryId' => 10669,
        'genre' => [],
        'img' => null,
        'parent' => 'Ryan Adams',
        'releaseYear' => 2003,
        'title' => 'We Are Fuck You',
    ],
    [
        'by' => 'Ryan Adams',
        'entryId' => 10675,
        'genre' => ['Alternative country'],
        'img' => '../static/images/220px-Love_Is_Hell.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2004,
        'title' => 'Love Is Hell',
    ],
    [
        'by' => 'Joan Baez',
        'entryId' => 10679,
        'genre' => ['Folk'],
        'img' => '../static/images/220px-DarkChords.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2003,
        'title' => 'Dark Chords on a Big Guitar',
    ],
    [
        'by' => 'Willie Nelson',
        'entryId' => 10697,
        'genre' => ['Alternative country'],
        'img' => '../static/images/220px-Songbird_Willie_Nelson.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2006,
        'title' => 'Songbird',
    ],
    [
        'by' => 'Cowboy Junkies',
        'entryId' => 10707,
        'genre' => ['Country rock', 'Alternative country'],
        'img' => '../static/images/220px-Trinityrevisited.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2007,
        'title' => 'Trinity Revisited',
    ],
    [
        'by' => 'Ryan Adams',
        'entryId' => 10714,
        'genre' => ['Heavy metal', 'hard rock'],
        'img' => '../static/images/220px-Ryan-adams-orion.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2010,
        'title' => 'Orion',
    ],
    [
        'by' => 'Whiskeytown',
        'entryId' => 10770,
        'genre' => ['Alternative country'],
        'img' => null,
        'parent' => 'Ryan Adams',
        'releaseYear' => 0,
        'title' => 'Forever Valentine',
    ],
    [
        'by' => 'Alabama Shakes',
        'entryId' => 10809,
        'genre' => ['Blues rock', 'roots rock', 'soul', 'Southern rock', 'garage rock', 'Americana'],
        'img' => '../static/images/220px-Alabama_Shakes_-_Sound_26_Color_album_cover.jpg',
        'parent' => 'Alabama Shakes',
        'releaseYear' => 2015,
        'title' => 'Sound & Color',
    ],
    [
        'by' => 'Terry Allen',
        'entryId' => 10890,
        'genre' => ['Country'],
        'img' => '../static/images/Terry_Allen_Lubbock28on_everything29.jpg',
        'parent' => 'Terry Allen (country singer)',
        'releaseYear' => 1979,
        'title' => 'Lubbock',
    ],
    [
        'by' => 'Terry Allen',
        'entryId' => 10893,
        'genre' => ['Country'],
        'img' => '../static/images/TerryAllen_Juarez.jpg',
        'parent' => 'Terry Allen (country singer)',
        'releaseYear' => 1975,
        'title' => 'Juarez',
    ],
    [
        'by' => 'Terry Allen',
        'entryId' => 10895,
        'genre' => ['Country'],
        'img' => '../static/images/Terry_Allen_Pedal_Steal.jpg',
        'parent' => 'Terry Allen (country singer)',
        'releaseYear' => 1985,
        'title' => 'Pedal Steal',
    ],
    [
        'by' => 'Terry Allen',
        'entryId' => 10899,
        'genre' => ['Country'],
        'img' => '../static/images/Terry_Allen_Human_Remains.jpg',
        'parent' => 'Terry Allen (country singer)',
        'releaseYear' => 1996,
        'title' => 'Human Remains',
    ],
    [
        'by' => 'X',
        'entryId' => 10913,
        'genre' => ['Alternative rock', 'alternative country'],
        'img' => '../static/images/XSeeHowWeAre.jpg',
        'parent' => 'Dave Alvin',
        'releaseYear' => 1987,
        'title' => 'See How We Are',
    ],
    [
        'by' => 'Dave Alvin',
        'entryId' => 10919,
        'genre' => ['Folk rock', 'country rock'],
        'img' => null,
        'parent' => 'Dave Alvin',
        'releaseYear' => 2011,
        'title' => 'Eleven Eleven',
    ]
];

$dataArtistes = [
    [
        'nom' => 'Yeat',
        'img' => 'https://img.buzzfeed.com/buzzfeed-static/complex/images/eys5ntxw6zjcxijbdznf/yeat-what-you-need-to-know.jpg?output-format=jpg&output-quality=auto',
        'biographie' => 'Noah Smith, connu sous le nom de Yeat, est un rappeur, chanteur, auteur-compositeur et producteur de musique américain.'
    ],
    [
        'nom' => 'Kanye West',
        'img' => 'https://media.gq.com/photos/5ad93798ceb93861adb912d8/16:9/w_2560%2Cc_limit/kanye-west-0814-GQ-FEKW01.01.jpg',
        'biographie' => 'Kanye West est un rappeur, producteur musical, styliste et designer américain.'
    ],
    [
        'nom' => 'Billie Eilish',
        'img' => 'https://mobile-img.lpcdn.ca/lpca/924x/r3996/5e5dedad-5507-11eb-a88b-02fe89184577.jpg',
        'biographie' => 'Billie Eilish Pirate Baird O\'Connell est une chanteuse, auteure-compositrice-interprète américaine.'
    ],
    [
        'nom' => 'Drake',
        'img' => 'https://resize.elle.fr/original/var/plain_site/storage/images/people/la-vie-des-people/news/drake-qui-est-sa-nouvelle-petite-amie-3938562/95093565-1-fre-FR/Drake-qui-est-sa-nouvelle-petite-amie.jpg',
        'biographie' => 'Drake est un rappeur, chanteur, auteur-compositeur-interprète et producteur de disques canadien.'
    ],
    [
        'nom' => 'Beyoncé',
        'img' => 'https://www.parismatch.com/lmnr/var/pm/public/media/image/Beyonce-Knowles_0.jpg?VersionId=KGBZadeqyxD5sVlf0jjQZmnd9cg3jR2p',
        'biographie' => 'Beyoncé Giselle Knowles-Carter est une chanteuse, actrice et productrice américaine.'
    ],
    [
        'nom' => 'Ed Sheeran',
        'img' => 'https://upload.wikimedia.org/wikipedia/commons/e/e9/Ed_Sheeran-6826_%28cropped%29.jpg',
        'biographie' => 'Ed Sheeran est un auteur-compositeur-interprète et musicien anglais.'
    ],
    [
        'nom' => 'Adele',
        'img' => 'https://resize.prod.femina.ladmedia.fr/rblr/652,438/img/var/2021-10/adelecoupeb.jpg',
        'biographie' => 'Adele Laurie Blue Adkins est une chanteuse et compositrice britannique.'
    ],
    [
        'nom' => 'Lady Gaga',
        'img' => 'https://www.gala.fr/imgre/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fprismamedia_people.2F2017.2F06.2F30.2Fe90d4ee0-c836-47ac-b696-bed2484c2882.2Ejpeg/2216x1536/quality/80/lady-gaga.jpeg',
        'biographie' => 'Lady Gaga, de son vrai nom Stefani Joanne Angelina Germanotta, est une chanteuse et actrice américaine.'
    ],
    [
        'nom' => 'Travis Scott',
        'img' => 'https://cdn-s-www.lalsace.fr/images/FE598AA4-3A48-4C24-B3BD-D78C4746E323/NW_raw/l-artiste-travis-scott-en-mai-2022-photo-sipa-image-press-agency-sipa-usa-xavier-collin-1689675643.jpg',
        'biographie' => 'Travis Scott, de son vrai nom Jacques Webster II, est un rappeur, chanteur et producteur américain.'
    ],
    [
        'nom' => 'Taylor Swift',
        'img' => 'https://images.seattletimes.com/wp-content/uploads/2023/07/07222023_swift_213100.jpg?d=2040x1479',
        'biographie' => 'Taylor Swift est une auteure-compositrice-interprète et actrice américaine.'
    ],
];

$dataTest = [
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBERERAREREREQ8RERAREQ8REhEREBERGBQZGRgUGBgcIS4lHB4rHxgYJjgmKy8xNzU1GiU+QDszPzA0NTEBDAwMEA8QHxISHDQrISwxNDQ0NDE0NDQ0NDE0NDY0NDQ0NDQ0NDQ0NDUxNDQ0MTU0NDQ0NDQ0MTE0NDE0NDE0Mf/AABEIAOEA4QMBIgACEQEDEQH/xAAbAAEAAgMBAQAAAAAAAAAAAAAAAQMCBAYFB//EAEAQAAICAQMBBgUDAgEICwAAAAECABEDBBIhMQUTIkFRYQYycYGRFEKhUrGSU2JyorLB0fAVIyQzNUOCk7Ph8f/EABYBAQEBAAAAAAAAAAAAAAAAAAABAv/EAB0RAQEBAAIDAQEAAAAAAAAAAAABESFBAhIxYVH/2gAMAwEAAhEDEQA/APlEREgREQEREBERARE3ex8e/UYlq+WavZEZz/swNN0KmmBU9aYEGvvCgk0AST0AFkzoviqiEbaoIdhagKCrKhqh5Wp/JnmdhkDU4rF/PQPTcEYr/rASS7OFsxTptBlyZBjVG3tyFZWU161VzeHw7qCm+l7uie8pylDqd+2q4M97MCS714/0+UKwpf2AVx58n6zV1py482NMeENifYVYqWu7JFixRUg9PpfMku/Fsxz+s7Ny4lDsAUbo6G161+PfpNbDibIwRFLOxoKOpM6rtbIuLFqca8oGfEi2dveMEV2APujH7ic1otScWRXF8dQCoJU9QLBH5Bl1Lw2D2PqPJAfYOlj8ma2o0mTH86Mo9SLW/TcOJ6WbttnIJ3UAFUWxoAUBy09bRduLlPdbUcujbVbGMe3IAW+YM29KB5J3eXF3EqbHIRPV7d0SYyj4xtXIGPd8HYyhSRY4PDjp6GeVEu8rZhERKEiIgIiICIiAiIgTERCEREBERASZEmAm32S5XUYiG2ksU3HoN6lOfbxVNSDfkaPkfQ+so6X4hUthsijjzU3sp3gD/Z/M8XshgNTgLcqMiWPa50TuNWmWgFOdDkRLv/rFILrfmRtv6BvOeL2NonbULvDImPc+RiOERRZP46evHrMyevDV5dFyHW/lD51ry8GdW/sf5lPZzoMQDHVtlVS6riyIiY0B4b/uners34Rf5mK5tzqCG3vjz5KH7d7px/qsf8M8f4kSsmMEAVhA28eEjLkFH3kkz4XyUdparfsReUTcd3mzmrP2qvzNGJbpsDZHCLQJ6k9FHmT7TTKqe52Ppe6Zc+QeNTePER8zAcFva6sel+Zmzi0mLFkGDEyPnvY2Vz4FfzVb688X0+vWO1NJqFUKischYjKwZQwrjaDY4J/p9JN6azt5nbWsD91jXlcStbervt3D7BFH5nmS3Pp3xkDIhUm6vofWj0MqlSkREBIkyICIiAiIgIiIExEQhERAREmAiIgIiIGzota2I9CyblYqGKMGH7kYfK3v7T28Hbad06vtLMGBOTGWdlBBCrtZlu/MqtUKYTm5s6DSNmcY19CzEeSqLJ/AkvJyw/VPv7wEh7ux6en09pjqMxd2cgCzwo6KPJR7CXdqaFtPkONr6WL61ZFH3BUj7TZ0XZLM2Bn+RyWZaNhBX5u5TFXZ2nwOuQ5cjIUAKgbelgXz15PQf/mPZAyd8ndAs/7lUhdyfuBJBAH2PlxOjGDROAr4xhLKCr7d6HqKLIoZTx0G67ExPYHdbsuHKAtMu8Pjy4gCKKsQaB9AWu6FGTVx5up7c1KqcBOREUknCMjnGS3O7YfDyD5AXc0V7RYGwAP8Y/swmvq8bo7o5t1YqxJuyPeUxifGzq9dky7d7bgt7RzxYA6kk9FUdfITWiJQiIhSREQEREBERAREQJiIhCIiBMREBERAREQE6fsTQhNHmdt4fUA48QStzVzyT0Sx4q54A/dc8PsrRHPlTGLom2IF0o5PE6ftftBMb48SNtXC6JS18w+Yk1RUnwWDyMYPnJpuTWlr9E+fLpboKybnPUICQ7E+3iJ+k9VtWdthHRDS40KVtxggo3Pqo5PmTN7CEx43ztiV8WMd2S7eB8ynYmmrzDKiO3+Zu8yJjr+0H1S5NVkADujnaOiquoVkX7K9faJOmv1ynxB4P04UkqqZF89prIWB97V1M1snazEcY8attChiN+yvNN1lT9Sep+k6bV6HCiafFqmRzk0+POhXvd2JXUbEyKo67QKKm66jpPOydlaOjtyKT5BMjlv8JFyRLOeHMOxJJJJJJJJ6knzkSzUY9jugO4I7oGHRgrEX96mE0iIiICIkQEREKREiAiIgIiIGUREISZEmAiIgIiICJMQPb7E1+PTI2RXUZrYMG+dV2+BkHmwbn2IHlc8zXOrMAnQIoZuaLkW1DyA4Ueuy+Loa0SYOg1HaNYkcuSjEZEwbiU74DY+6xwQEWz5gD1nQknuUDg78iZxXmGI3Af6o/ifPqE6TL2wG0+mLN40dT4K3FlRVIK8dAgPvv/OpezWz8YsyOXRyu/IqccWiafEE+22pz+ftXU5AVfUZXU9VZyQZ0uVtLrEx+Ny6Bdy7M73txolju0Zh4UWwwAuyCQZqZuy9EP8AzCnsy6pf9tBMLZrmIns67s3AuN3xZNzJRKkmiNyigSBz4j5/tM8aaLMJEmIREgyZEBESIEyIiAiIhSJEQM4iIRMREBERASYiAiIgJERARURCFc30PqOD+ZsfrM1Fe/z7TwV73JtI+lzXiBm+V2rc7sB0DMSBMIiFJEmRAiIkQEREBEiICIiBMSIgZxEQJiIgIiIExEQERECDF37/AEkz0tP2JqG0mbVYyjYVtWUPeVQHG5toHArk8jjnpA8xAWsgdIkadyGAurH8+X81C9BBUyGPp1PT6yZizlSrDyYH1/jziIyRmPAAPsQL49Ddwx5Irjy5ux6zd7O0+PK+LHvcO+XGq+AKjozkPbhrBC7SOP6h6X6Hxh2fh0uoTDhVgFxKzl3L2zM1VfSgB+fyv1XgmREQIiIgJERAREQERIgTERAziRJlExESBJkSYCIiAiIgJ6XZPbmfSDKMRTbmULkV1LLxdECxzyR955sxyj5VJ2huvpXFE/8APvGBnKkhzdvtJA/ced3+j+316n6SVa+aNH+D6SwptA3lt21TjSmAdTYBUj9tj1Esx4kdLakY0Aq3tK7XtjzwQwQe++/KMGuZBAtb6WCQCLIBlbt8gPQkX6y3Ii7ioYN+1W5CtzW4E+RoHmusDHGhU7kZgy8qRYKnrYI6GgZk+QuSxZnJPzMxZj6WTzLdKluoVlc1xVgcDpzR6e0wzqoYkHxH5lqq8KkNfSms19PeTeVzjVciTIlQkSZEBEiIExIiAiIgIiIGcmRECZMiIExEQJiRJgSqk3QJ2jc1Anav9R9ByOZE6L4MzMczabcipnWjuCgs4IpQep4J49p0PbfwfpsYfKxdEVCWbGPAGq92yufoJbkmt+s9Zd5/j507UJnicOxe1AUBVDgVyeTV9LLHjpc12DMSLIUm+ep9J6adm7dOmpvcjZmxBFDbhlVbCkfuBFGwfOuDLGK8/VhgxVlClBsKqE6jjkr1PvyTLdP0UsdoAIJr0B/+h+JI0jMN52Jj4G9qVbArihy3sAW8yPOVM9kqrEot7bGyxY/bZqyAftM6K8g5S+BdE+khz4lHBKgDn5T9jLXWxX8zEajxLuWwtBgvmB1PPQ/x7SwWPkQOrIWboWZupbqT/abevClrXgFFo/1bOE++2x9VmoQNocBKJI4ddwPkCnzeRN9ORzOkz9jnJ2fpdTjRECKxyh2KZXCsRaux27SASF45PF9JmrK5i4luHAcjhMQORmICqoNknyrynSL8Hvjo6rKuEbCzbaYIa43MeOOL/v5zUlvwnjbcjlZElhRIsGiRYuj7j2kSIRIiBMSIgTIiICIiBnJkRAmTIiBlEiIExEQJRypBUlWHRlJVh9COk9jWfE2rzYe4dwUuywBDua5LG+p/3+U8aQTKstnMDOr7V7X0efs3TadQw1OJkXHjSkCuAQ7NQ5U9eOSWHNhjOTJlRJVg3oy8efr/ALpEbKaYMrMuTH4PCFbIqufPwqTbXfl530mspBdjVH08pYxVGelVgQwVjuoc8Mt1zx5jzkGt7VdcHnrZFn+bgZXMcBK5Aw4KkNfFKQRRNg2Lry85NzLTohLl8gx0tjcrMGIBO3wg1ZAFkVzzLBOTEpChCDQawXs31LAUKFEDz5Bnraj4j1Xdfpy9KqBN1APsoeGwa6ce4Ju+K8zX6PLgY99ifCzruRWXaSpbrX2M01PTm+fwbk4o674I7XwaZsgybELc72H7aAIB8iKuvO5Z8T/FOPU4zhwo20kXkcbaUc7VF37Wa4vjzHIxLbuNXy3PwkRIkZTEiIExIiBMiIgIiIGcSvf7Sd/tAsiV7/aN/tAtkynvPaT3ntAti5V3ntHee0Cy5BMr3+0jvPaBYTKch5+39plvmDGyPuIF+r2EY2QnnGu9Tfgyiw1HzBoN7bq8pgDZY+4H4FTZwaZSquXxkKgyPj3hMhUZCrIt8Fqpq603ANGaamtwPW5Rbc2MAY4s4UE22CyOfNwFrzskTU3y7T59i5TzbIqIQa2sWB3V5+EOPYsJBXn1D5KOR3cqKBdmcgegs8SczqxQKKC41U8Ud1Esf8RP4jTsDkxWoIDICoW9wseQ+Yn+ZhkI3tQ8O5qB44viBlEx3xvgTEx3SN0DKJjujdAykzDdG6BlEx3RugZRIuICIluLS5H+RGY9aUEmvoIFUTb/AOjNR/kMv/tv/wAIPZmo/wAhl/wP/wAIGpE2W0GYdceQfVGErOme62myaA8yfSBVImTKQaPBkQIiTIgJi0ymLDiBsYFIUZLVlV1Bx2N5HW9v9Plfqa85hqFC5MijoHcD7EibWjyDva3KgYqd4UsF86qrI5AI5uuhlGo2hnBD7wQtlQlEcMCnl58f2hFM9LsrWZMSZThKh8mTBiBZUbwkOSBuBA5C8zzTL9JlC8nbSBiAwJDE0KroDxfldVfSOlV6jEcbFD8wCE9QVJANH0Iuj7iVKbmSCzxzVsbo9PW+sgKR5ceR9YExEQERJgREmIERJqTAiJMVAiJMQE7rs3LqG0GiwYsLviDnUZ2UruOJdQxpQWAoi7PHSrqcLOr7CynZqK3UOx9Ul81alXoH1G8/kQOm/W5l1WfUfp9SMGoxYQvjx0pVV3t84BHHuD58Tz8R1iLoC+n1JOjasyll7t+S1lmyVu5TgqPqeI1mFW0+n7uu5fWZ8OHb8tZAgO323o/8y/tgIcXaAey3/STFVq0fbpQSrH9oKBqPka4gamuOuY9oYkwalG1ndPiw95j3IqnxnbuuivHH3mx2ribUZ82VNLmTBk0OTSK5GBgMquWVgN9fKoHWx9p6KsD2ljKghSmMi7LBP0eUgE/X+Z5XZWBG7P8AGiD/ALZ2c+xLIp1wKWJP7mV2v3JkHE9r4nTPlXIhx5N9spIJUsN1WDXQiac9z41/8R1X+mn/AMaTw4nwhESZRENjbaDtbaTQajtv6zoPhLsPHrXzJkdlKIjLtqyC3iPI9BX/AKp9DwdjafDgXAqB0U7l7zxkvusHnpz6SW4smvkeNQMjNidguKnR/lbwkUR6G5Z2rpWx5Njm8oCOx8RLb1DhiT50wv3udb2/8IZcmZ8unVEDqS+Kyu1gOdoA5uunqZyes0WTE6qSO92Y3ZQSGTcoO1r6MBVjyuPaX4z209pbgf8AIl2mxq25WYqFxuyUtlmUFgp9LF8+UjTabJkyLjxoXyMSAi9SR1r8TrdJ2HrmTEp0/dFVADuUJL72bdsXxLw7IbsEbbAoVbc7VyeTAVamU0CFJJqmYHaSfTi/tGXaUB3eLe3h/pShTff/AITt9D8NNpqbUHG1gr3YLMpQfua+Afz1PM6LsvszB42TGmNnUISAKK+1fX+Ji+TWPkETqvib4S/R42zLm3JvVVUrTU3XxXzXHl6zlpqWVlEmKiUIiICIkwIiTEKiJNRAid92Djyfp8IGozrj7vTAoEwtj26jUPjdVLIaFBSRz0P0HCBZtoLVRufavIXc20G7sC6HJMI+gI+Zw3d6rK+HGmLLpgMOlshu8CFbQAUEHPH7unl53aGpfdiwtmZ/1OrOPNvw6UoSpxAPWzlgHAs/0zlNvAG56VSqje1BefCOeB4m4/zj6zDuB7+vU9fWB9HGhy1+pbVZ0yhHWzj0gy7FcgLuCeg/Pp0mnjwOAzfqc4xXpScapplZmLFFa+7rwhUrg1XX04lgSOXc9Ty7Hkkknr5kk/czBgaA3P4eFG96Au+BfHJuBp6rUvlyPkdmd3O5mY2x48z9P7SqpY+OpjUDGoqZVFQNjRah8bb8bMjjoykqw+4n134c7V0uXT4S+ZO+XGi5BkcK/eADc3i683zPjizcx5iBUz5TR9d7U+IdHgQsciuwNhMJDu59OOg+pAngav4q7PyozvpXOSiKfFhLHj+vceJwbZiZRke5ieERsdj9oPpdR3+NUsbgEcFk2Mfl8j9/adv2P8db8hGrxqidUyYg7hDVEMpJPn1H4nzsS5MlTdko+wan4h7O7sk6nC3BO29z/TZV/wAT5unb2bFlynTZWTC2R2RGRSoUmwArDwj2nmNmNTWZpmeKvQ7Y7Y1GqAGXKXVTYUKqID60Bz955EsYzCbkwRUREoREmBESYgRJiIVESYgZrNrHEQi2DEQEraIhGu8qiICIiBkJYsRIJmLREggSREQMjMDEQrAzGImgiIgIiICIiFJMRAREQP/Z',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
    [
        'img' => 'data:image/jpeg;base64,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',
        'title' => 'Lyfe',
        'releaseYear' => 2011,
    ],
];

$dataAlbumSimilaires = [
    [
        'by' => 'Superdrag',
        'entryId' => 67913,
        'genre' => ['Rock', 'Punk'],
        'img' => '../static/images/Superdrag-Stereo_360_Sound.jpg',
        'parent' => 'Superdrag',
        'releaseYear' => 1998,
        'title' => 'Stereo 360 Sound',
    ],
    [
        'by' => '16 Horsepower',
        'entryId' => 10575,
        'genre' => ['Alternative country', 'neofolk'],
        'img' => '../static/images/220px-Folklore_hp.jpg',
        'parent' => '16 Horsepower',
        'releaseYear' => 2002,
        'title' => 'Folklore',
    ],
    [
        'by' => 'Ryan Adams',
        'entryId' => 10637,
        'genre' => ['Alternative country', 'country'],
        'img' => '../static/images/220px-RyanAdamsHeartbreaker.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2000,
        'title' => 'Heartbreaker',
    ],
    [
        'by' => 'Ryan Adams',
        'entryId' => 10644,
        'genre' => ['Rock', 'alternative country', 'pop rock'],
        'img' => '../static/images/220px-Ryanadamsselftitled.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2014,
        'title' => 'Ryan Adams',
    ],
    [
        'by' => 'Whiskeytown',
        'entryId' => 10660,
        'genre' => ['Alternative country'],
        'img' => '../static/images/220px-WhiskeytownPneumonia.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2001,
        'title' => 'Pneumonia',
    ],
    [
        'by' => 'Jesse Malin',
        'entryId' => 10668,
        'genre' => [],
        'img' => '../static/images/The_Fine_Art_of_Self_Destruction.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2002,
        'title' => 'The Fine Art of Self Destruction',
    ],
    [
        'by' => 'The Finger',
        'entryId' => 10669,
        'genre' => [],
        'img' => null,
        'parent' => 'Ryan Adams',
        'releaseYear' => 2003,
        'title' => 'We Are Fuck You',
    ],
    [
        'by' => 'Ryan Adams',
        'entryId' => 10675,
        'genre' => ['Alternative country'],
        'img' => '../static/images/220px-Love_Is_Hell.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2004,
        'title' => 'Love Is Hell',
    ],
    [
        'by' => 'Joan Baez',
        'entryId' => 10679,
        'genre' => ['Folk'],
        'img' => '../static/images/220px-DarkChords.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2003,
        'title' => 'Dark Chords on a Big Guitar',
    ],
    [
        'by' => 'Willie Nelson',
        'entryId' => 10697,
        'genre' => ['Alternative country'],
        'img' => '../static/images/220px-Songbird_Willie_Nelson.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2006,
        'title' => 'Songbird',
    ],
    [
        'by' => 'Cowboy Junkies',
        'entryId' => 10707,
        'genre' => ['Country rock', 'Alternative country'],
        'img' => '../static/images/220px-Trinityrevisited.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2007,
        'title' => 'Trinity Revisited',
    ],
    [
        'by' => 'Ryan Adams',
        'entryId' => 10714,
        'genre' => ['Heavy metal', 'hard rock'],
        'img' => '../static/images/220px-Ryan-adams-orion.jpg',
        'parent' => 'Ryan Adams',
        'releaseYear' => 2010,
        'title' => 'Orion',
    ],
];

$dataTitres = [
    [
        'position' => 1,
        'nom' => 'Poppin',
        'duree' => '2:48',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 2,
        'nom' => 'Outsidë',
        'duree' => '3:51',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 3,
        'nom' => 'Rëal six',
        'duree' => '3:29',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 4,
        'nom' => 'Nvr again',
        'duree' => '2:47',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 5,
        'nom' => 'Luh gëek',
        'duree' => '2:56',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 6,
        'nom' => 'Rackz got më',
        'duree' => '3:02',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 7,
        'nom' => 'Doublë',
        'duree' => '2:51',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 8,
        'nom' => 'On tha linë',
        'duree' => '2:35',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 9,
        'nom' => 'Jus bëtter',
        'duree' => '3:09',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 10,
        'nom' => 'Jump',
        'duree' => '3:13',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 11,
        'nom' => 'Dnt lië',
        'duree' => '3:32',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 12,
        'nom' => 'Rollin',
        'duree' => '3:37',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 13,
        'nom' => 'Taliban',
        'duree' => '2:59',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 14,
        'nom' => 'Narcoticz',
        'duree' => '3:50',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 15,
        'nom' => 'Call më',
        'duree' => '3:40',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 16,
        'nom' => 'Kant dië',
        'duree' => '2:42',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 17,
        'nom' => 'Gëek high',
        'duree' => '2:33',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 18,
        'nom' => 'Luh m',
        'duree' => '3:30',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 19,
        'nom' => 'Smooktobër',
        'duree' => '2:56',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
    [
        'position' => 20,
        'nom' => 'Still countin',
        'duree' => '2:51',
        'image' => 'https://upload.wikimedia.org/wikipedia/en/thumb/9/91/Yeat2AliveCover.png/220px-Yeat2AliveCover.png',
        'album' => '2 Alivë'
    ],
];


$dataArtisteTest = [
    [
        'id' => 1,
        'nom' => 'Yeat',
    ],
    [
        'id' => 2,
        'nom' => 'Rémi',
    ],
    [
        'id' => 3,
        'nom' => 'Kris',
    ],
    [
        'id' => 4,
        'nom' => 'Irvyn',
    ],
    [
        'id' => 5,
        'nom' => 'Kaaris',
    ],
    [
        'id' => 6,
        'nom' => 'Jenesaispas',
    ],
    [
        'id' => 7,
        'nom' => 'Playboi Carti',
    ],
    [
        'id' => 8,
        'nom' => 'Taylor Swift',
    ],
    [
        'id' => 9,
        'nom' => 'Kayne West',
    ],
    [
        'id' => 10,
        'nom' => 'MIGOS',
    ],
    [
        'id' => 11,
        'nom' => 'Talmo',
    ],
]

?>

<script>
// Initialiser la variable JavaScript avec les données artistiques
const dataArtisteTest = <?php echo json_encode($dataArtisteTest); ?>;
</script>
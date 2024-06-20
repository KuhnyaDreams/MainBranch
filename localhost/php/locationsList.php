<div class="location-list" id='locList'>
    <?php 
    require('connectToDB.php');
    $query=mysqli_query($link,"SELECT * FROM `pins` ORDER BY `id`");
    $pins = mysqli_fetch_all($query);
    foreach ($pins as $pos){      
        $temp =explode(", ",$pos[2]);
        echo"
        <div class='landmark' onclick='openMore(".$pos[0].")'>
            <div class='landmark-info'>  
                <div class='landmark-name'>
                    <div>".$pos[1]."</div>
                </div>

                <div class='landmark-description'>
                    <div>".$pos[7]."</div>
                </div>

                <div class='landmark-misc'>
                    <div>".$pos[5]."</div>
                </div>
            </div>
            <img class='photo-landmark' src='".$pos[4]."' alt='photo landmark' width='166px' height='110px'>
        </div>
        ";
    }
    mysqli_close($link);

    ?>
</div>
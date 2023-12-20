<?php
require_once('./model/modele.php');
require_once('./model/version.php');

$marqueModel = new MarqueModel();
$modeleModel = new ModeleModel();
$versionModel = new VersionModel();
class accueil {

public function navBar(){
 ?><div style=" display:flex; justify-content:center;align-items-center">

 
 <div class="navbar">
    <ul>
        <li><a href="">Accueil</a></li>
        <li><a href="">Marques</a></li>
        <li><a href="">Comparateur</a></li>
        <li><a href="">News</a></li>
        <li><a href="">Guides d'achats</a></li>
        <li><a href="">Contact</a></li>


    </ul>
 </div></div>
 <?php
}    
public function header(){
    ?>
    <header>
        <div class="header">
        <h1>Logo</h1>
        <div class="socialContainer">
           <a href="https://www.google.com/"> <img src="./img/assets/google.png"></img></a>
           <a href="https://www.facebook.com"><img src="./img/assets/facebook.png"></img></a>
           <a href="https://www.twitter.com"><img src="./img/assets/twitter.png"></img></a>

        </div>
        </div>
        
    </header>
    <?php
}
    public function head($title, $description)
    {
?>
  <!DOCTYPE html>
  <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="pragma" content="no cache" />
            <title><?php echo $title ?></title>
            <meta name="description" content=<?php echo $description ?> />
            <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;300;500;600;700;800;900&family=Oswald:wght@300;300;600;700&family=Poppins:wght@500;900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="styles.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
    <?php
    }

    public function newsSection($news){

?>

    <div class="newsContainer">
        <?php 
        if(empty($news)){
            ?>
        <p>Nothing to display</p>
        <?php
        } else {
            $delay=0;
            foreach ($news as $singleNews) {
                ?>
                <div class="newsItem" style="animation-delay: <?php echo $delay; ?>s;">
                    <div class="titleContainer"> 
                        <h2><?php echo $singleNews['title']; ?></h2>
                    </div>
                    <div class="imageContainer">
                        <?php 
                        if (!empty($singleNews['images'])) {
                            ?>
                            <img src="./img/news/<?php echo $singleNews['images'][0]; ?>" alt="News Image">
                            <?php
                        } else {
                            ?>
                            <p>No image available</p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                $delay+=5;
            }
        }
        ?>
    </div>
  <?php  
    }
    public function marquesSection($marques)
{
    $numSlides = ceil(count($marques) / 3);
    ?>
    <div class="marquesContainer">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php for ($i = 0; $i < $numSlides; $i++) : ?>
                    <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                        <div style="display:flex; justify-content:space-around; align-items:center;">
                            <?php
                            for ($j = $i * 3; $j < min(($i + 1) * 3, count($marques)); $j++) :
                            ?>
                                <img src="./img/marques/<?php echo $marques[$j]['images'][0] ?? ''; ?>.png" alt="..." style="width:200px; height:auto;">
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' fill=\'%23F41F11\' viewBox=\'0 0 8 8\'%3E%3Cpath d=\'M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z\'/%3E%3C/svg%3E') !important;"
></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' fill=\'%23F41F11\' viewBox=\'0 0 8 8\'%3E%3Cpath d=\'M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z\'/%3E%3C/svg%3E') !important;"

></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <?php
}

    public function footer (){
        ?>
        </html>
        <?php
    }

    public function separator(){
        ?>
        <div style="display:flex;justify-content:center;">
        <div style="width:90%;height:5px;background-color:#F41F11;margin-top:50px;"></div></div>
        <?php
    }
    public function comparaison($marques)
{
    ?>
    <h1 style="margin-top:50px;text-align:center">Comparez vos vehicules</h1>
    <form id="comparisonForm" style="display:flex;flex-direction:column;justify-content:center;align-items:center;gap:50px">
        <div style="margin-left:5%;padding-top:50px;width: 90%; display: flex; flex-direction: row; justify-content: space-around; align-items: center;" class="comparaison_container">
            <?php for ($i = 0; $i < 4; $i++) : ?>
                <div id="container_<?php echo $i; ?>" style="width: 300px; height: 400px; border: 2px solid #F41F11; border-radius: 10px;display:flex;flex-direction:column;justify-content:space-around;align-items:center">
                    <!-- Marque Dropdown 54-->
                    <select id="marque_<?php echo $i; ?>" class="marqueDropdown" style="width:70%;height:40px;padding:5px;color:#F41F11; outline:none;border-radius:5px;" onchange="updateModeles(this, <?php echo $i; ?>)">
                        <option value="">Marque</option>
                        <?php foreach ($marques as $marque) : ?>
                            <option value='<?php echo $marque['id']; ?>'><?php echo $marque['nom']; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <!-- Modele Dropdown -->
                    <select id="modele_<?php echo $i; ?>" class="modeleDropdown" style="width:70%;height:40px;padding:5px;color:#F41F11; outline:none;border-radius:5px;" onchange="updateVersions(this, <?php echo $i; ?>)" disabled>
                        <option value="">Modele</option>
                    </select>

                    <!-- Version Dropdown -->
                    <select id="version_<?php echo $i; ?>" class="versionDropdown" style="width:70%;height:40px;padding:5px;color:#F41F11; outline:none;border-radius:5px;" disabled>
                        <option value="">Version</option>
                    </select>
                </div>
            <?php endfor; ?>
        </div>
        <button type="button" onclick="submitForm()" style="width:250px;height:50px;color:white;text-align:center;background-color:#F41F11;border-radius:10px;border:none;font-size:20px;">Comparer</button>
    </form>
    <script>
        function updateModeles(element, containerIndex) {
            var container = $("#container_" + containerIndex);
            var marqueId = $(element).val();
            console.log(marqueId);
            
            var modeleDropdown = container.find('.modeleDropdown');
            
            $.ajax({
                type: "POST",
                url: "./model/modele.php",
                data: { marqueId: marqueId },
                dataType: "json",
                success: function (data) {
                    console.log("success");
                    modeleDropdown.empty();
                    modeleDropdown.append('<option value="">Modele</option>');
                    $.each(data, function (index, modele) {
                        modeleDropdown.append($("<option>").attr("value", modele.id).text(modele.nom));
                    });
                    modeleDropdown.prop("disabled", false);
                },
                error: function (xhr, status, error) {
                    console.log("failed");
                    console.error("AJAX Error:", status, error);
                }
            });
        }

        function updateVersions(element, containerIndex) {
            var container = $("#container_" + containerIndex);
            var modeleId = $(element).val();
            console.log(modeleId);

            var versionDropdown = container.find('.versionDropdown');
            
            $.ajax({
                type: "POST",
                url: "./model/version.php",
                data: { modeleId: modeleId },
                dataType: "json",
                success: function (data) {
                    versionDropdown.empty();
                    versionDropdown.append('<option value="">Version</option>');
                    $.each(data, function (index, version) {
                        versionDropdown.append($("<option>").attr("value", version.id).text(version.nom));
                    });
                    versionDropdown.prop("disabled", false);
                },
                error: function (xhr, status, error) {
                    console.log("failed");
                    console.error("AJAX Error:", status, error);
                }
            });
        }
        function isSelected(num){
            const marque=$(`#marque_${num}`);
            if(marque.val()) return true;
            else return false;
        }
        function isReady(num){
         const marque=$(`#marque_${num}`);
         const modele=$(`#modele_${num}`);
         const version=$(`#version_${num}`);
         if(marque.val() && modele.val() && version.val()  ) return true;
         else return false;
        }
        function submitForm() {
    let readyCount = 0;

    for (let index = 0; index < 4; index++) {
        if (isReady(index)) {
            readyCount++;
        } else if (isSelected(index)) {
            alert("Please fill in all fields.");
            return; // Stop processing if an alert is shown
        }
    }

    if (readyCount >= 2) {
        $('#comparisonForm').submit();
        console.log("passed");
    } else {
        alert("Please enter at least 2 vehicles.");
    }
}

        
    </script>
<?php
}

}
?>
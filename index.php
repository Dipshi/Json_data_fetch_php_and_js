<?php
$json = file_get_contents('https://cdn.pinkvilla.com/feed/fashion-section.json');
$data=json_decode($json,true);
usort($data, function($a, $b) { //Sort the array using a user defined function
    return $a['viewCount'] > $b['viewCount'] ? -1 : 1; //Compare the viewCount
  });                                                                                                                                                                                                        
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>       
    </head>
  <style>
    .card-columns
    {
        column-count: 5;
    }
    .navbar-brand
    {
        font-size: 2rem;
    }
    .card{
        border: none;
    }
    @media screen and (max-width: 1200px) {
    .card-columns
    {
        column-count: 3;
    }
    .card-text{
        font-size: 2rem;
    }
    .navbar-brand{
        font-size: 3rem;
    }
    }
    @media screen and (max-width: 1000px) {
    .card-columns
    {
        column-count: 2;
    }
    .card-text{
        font-size: 2rem;
    }
    .navbar-brand{
        font-size: 3rem;
    }
   
    }


 </style>
<body>
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a style="color: #e8557d;padding:10px" class="navbar-brand" href="#">Pinkvilla</a>
    </nav>
</div>
<div class="container-fluid">
        <div class="card-columns mt-5"> 
        <?php
            if(isset($data)) {
                foreach ($data as $key => $value) {
                ?>
                    <div class="card">
                        <a href="<?php echo 'https://www.pinkvilla.com/'.$value['path'] ?>"><img style="height: <?php echo $value['image']['height'] ?>; width: <?php echo $value['image']['width'] ?>;border-radius:16px" src="<?php echo $value['imageUrl'] ?>" class="card-img-top" alt="image"></a>
                        <div class="card-body">
                            <p ><a class="card-text" style="color:black" href="<?php echo 'https://www.pinkvilla.com/'.$value['path'] ?>"><?php echo $value['title'] ?></a></p>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
        </div>
    </div>

</body>
</html>

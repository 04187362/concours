<?php
  	
  	include('entites/ClsEvenement.php');
?>

<?php
	if(!empty($_POST['commentaire']))
	{

		$commentaire=addslashes(htmlspecialchars($_POST['commentaire']));

		$nomPhoto=$_FILES['image']['name'];
		
			$fichierTempo=$_FILES['image']['tmp_name'];

			if(isset($email_ens) || !empty($fichierTempo)){

				$image = explode('.', $nomPhoto);
								$image_ex = end($image);

								if(in_array(strtolower($image_ex), array('png','jpg','jpeg'))===false){

									echo '<div style ="color:orange; text-align:center" >Veillez rentrer une image ayant pour extension : jpg, png ou jpeg.</div>';

								}else{
									
									$image_size = getimagesize($fichierTempo);

									if($image_size['mime']=='image/jpeg'){
										$image_src = imagecreatefromjpeg($fichierTempo);
									}else if($image_size['mime']=='image/png'){
										$image_src = imagecreatefrompng($fichierTempo);
									}else{
										$image_src = false;
										echo '<div style ="color:orange; text-align:center" ><b> Veillez rentrer une image valide.</b></div>';
									}
								}

								if($image_src !== false){
				
									$image_width = 1000;
									if($image_size[0]==$image_width){
										$image_finale = $image_src;
									}else{
										$new_width[0] = $image_width;
										$new_height[1] = 1000;

										$image_finale = imagecreatetruecolor($new_width[0], $new_height[1]);

										imagecopyresampled($image_finale, $image_src, 0, 0, 0, 0, $new_width[0], $new_height[1], $image_size[0], $image_size[1]);

									}

									imagejpeg($image_finale, 'img/photos/'.$nomPhoto);

									//move_uploaded_file($fichierTempo, 'images/'.$nomPhoto);

									$evenement = new Evenement();

									$evenement->setImage($nomPhoto);
									$evenement->setCommentaire($commentaire);

									$count = $evenement->ajouterEvenement();

									if($count>0){

										echo '<div class ="text-mint text-center" >Evenement enregistré avec succès.</div>';
									
									}else{

										echo '<div class ="text-orange text-center" >L\'insertion a échouée.</div>';
									
									}


								}	

								

							}else{

								echo '<div class ="text-orange text-center" >L\'image est obligatoire.</div>';

							}						
	
		
	}
	else
	{
		
		echo '<div classe ="text-orange text-center">Tous les champs sont obligatoires.</div>';
	}

		
?>

    <div class="container withoutjumbotron">

    
      <!-- Example row of columns -->
      <div class="row">

	        <div class="col-md-4 col-md-offset-1">
				<h2>Inscription</h2>
				<?php Helper::includeModule($this->formPath, $form, @$msgform)?>
			</div>


	        <div class="col-md-4 col-md-offset-1">

				<h2>Connexion</h2>
				<?php Helper::includeModule($this->formPath, $formLog, @$msglogform)?>
				
			</div>


		</div>

	</div>




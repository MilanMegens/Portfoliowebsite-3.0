<?php get_header(); ?>
<body>
	<div class="herobox centered">
		<div class="content">

			<!-- Afbeelding div -->
			<div class="afbeelding">
				<?php
					$image = get_field('case_studies_screenshot');
					$title = get_field('case_studies_titel');
					if( $image ): 
						$image_url = $image['url']; 
				?>
					<!-- Afbeelding -->
					<div class="image-container">
						<img src="<?php echo esc_url( $image_url ); ?>" class="case-study-image" />
						
						<!-- Titel over de afbeelding -->
						<?php if( $title ): ?>
							<div class="title-overlay">
								<h1><?php echo esc_html( $title ); ?></h1>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div><!-- Einde afbeelding div -->

			<div class="tekst"><!-- Tekst div -->
				<div class="overzicht"><!-- Overzicht div -->
					<h2>Overzicht:</h2>
					<?php if( get_field('case_studies_datum') ): ?>
						<p><strong>Datum: </strong><?php the_field('case_studies_datum'); ?></p>
					<?php endif; ?>

					<?php if( get_field('case_studies_rol') ): ?>
						<p><strong>Rol: </strong><?php the_field('case_studies_rol'); ?></p>
					<?php endif; ?>

					<?php if( get_field('case_studies_talen') ): ?>
						<p><strong>Talen: </strong><?php the_field('case_studies_talen'); ?></p>
					<?php endif; ?>
				</div><!-- Einde overzicht div -->

				<div class="Probleemstelling"><!-- Probleemstelling div -->
					<h2>Probleemstelling:</h2>
					<?php if( get_field('case_studies_achtergrond') ): ?>
						<p><strong>Achtergrond: </strong><?php the_field('case_studies_achtergrond'); ?></p>
					<?php endif; ?>

					<?php if( get_field('case_studies_uitdaging') ): ?>
						<p><strong>Uitdaging: </strong><?php the_field('case_studies_uitdaging'); ?></p>
					<?php endif; ?>
				</div><!-- Einde Probleemstelling div -->

				<div class="Aanpak"><!-- Aanpak div -->
					<h2>Aanpak:</h2>
					<?php if( get_field('case_studies_plan') ): ?>
						<p><strong>Project Plan: </strong><?php the_field('case_studies_plan'); ?></p>
					<?php endif; ?>
					
					<?php if( get_field('case_studies_ontwerp') ): ?>
						<p><strong>Ontwerp: </strong><?php the_field('case_studies_ontwerp'); ?></p>
					<?php endif; ?>

					<?php if( get_field('case_studies_ontwikkeling') ): ?>
						<p><strong>Ontwikkeling: </strong><?php the_field('case_studies_ontwikkeling'); ?></p>
					<?php endif; ?>
				</div><!-- Einde Aanpak div -->

				<div class="Resultaten"><!-- Resultaten div -->
					<h2>Resultaten:</h2>
					<?php if( get_field('case_studies_eindproduct') ): ?>
						<p><strong>Eindproduct: </strong><?php the_field('case_studies_eindproduct'); ?></p>
					<?php endif; ?>

					<?php if( get_field('case_studies_impact') ): ?>
						<p><strong>Impact: </strong><?php the_field('case_studies_impact'); ?></p>
					<?php endif; ?>

					<?php if( get_field('case_studies_feedback') ): ?>
						<p><strong>Feedback: </strong><?php the_field('case_studies_feedback'); ?></p>
					<?php endif; ?>
				</div><!-- Einde Resultaten div -->

				<div class="Reflectie"><!-- Reflectie div -->
					<h2>Reflectie:</h2>
					<?php if( get_field('case_studies_lessen') ): ?>
						<p><strong>Geleerde lessen: </strong><?php the_field('case_studies_lessen'); ?></p>
					<?php endif; ?>

					<?php if( get_field('case_studies_verbeteringen') ): ?>
						<p><strong>Toekomstige verbeteringen: </strong><?php the_field('case_studies_verbeteringen'); ?></p>
					<?php endif; ?>
				</div><!-- Einde Reflectie div -->

				<div class="Bijlagen"><!-- Bijlagen div -->
					<h2>Bijlagen:</h2>

					<!-- Github repo -->
					<?php if( get_field('case_studies_github') ): ?>
						<p class="icon-item">
							<a href="<?php the_field('case_studies_github'); ?>" target="_blank">
								<i class="fab fa-github"></i> <!-- GitHub icon -->
							</a>
						</p>
					<?php endif; ?>

					<!-- Figma design -->
					<?php if( get_field('case_studies_design') ): ?>
						<p class="icon-item">
							<a href="<?php the_field('case_studies_design'); ?>" target="_blank">
								<i class="fab fa-figma"></i> <!-- Figma design icon -->
							</a>
						</p>
					<?php endif; ?>

					<!-- Website -->
					<?php if( get_field('case_studies_website') ): ?>
						<p class="icon-item">
							<a href="<?php the_field('case_studies_website'); ?>" target="_blank">
								<i class="fas fa-globe"></i> <!-- Website icon -->
							</a>
						</p>
					<?php endif; ?>

					<!-- Documentatie en screenshots -->
					<?php $file = get_field('case_studies_documentatie'); ?>
					<?php if ($file): ?>
						<p class="icon-item">
							<a href="<?php echo esc_url($file['url']); ?>" download="<?php echo esc_attr($file['filename']); ?>" class="tooltip">
								<i class="fas fa-file-archive"></i> <!-- Download icon -->
								<span class="tooltip-text">Download documentatie en screenshots</span>
							</a>
						</p>
					<?php endif; ?>
				</div><!-- Einde Bijlagen div -->

				<p><a href="https://milanmegens.test/case-studies" class="btn-back">Terug naar projecten</a></p>
			</div><!-- Einde tekst div -->
		</div>
	</div>

	<!--  / content container \ -->
	<main id="contentCntr" class="">
		<!-- Andere content kan hier worden toegevoegd -->
	</main>
	<?php get_footer(); ?>

	<style>
		.centered { padding: 0; }
		.image-container { position: relative; display: inline-block; width: 100%; }
		.case-study-image { width: 100%; filter: brightness(40%); }
		.title-overlay h1 { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #fff !important; font-size: 70px; font-weight: bold; text-align: center; padding: 10px; }
		.tekst { padding-left: 120px; padding-right: 120px; width: 100%; }
		.tekst h2 { font-size: 20px; font-weight: bold; margin-top: 50px; margin-bottom: 20px; }
		.tekst p { color: #000 !important; font-size: 16px; margin-bottom: 10px; }
		.herobox .content { width: 100% !important; }
		.btn-back { display: inline-block; padding: 20px 40px; background-color: #fff; color: #000; text-decoration: none; border: 1px solid #000; border-radius: 5px; margin-top: 50px; font-weight: bold; transition: background-color 0.3s ease; }
		.btn-back:hover { background-color: transparent; }
		.icon-item { display: inline-block; margin-right: 15px; }
		.icon-item a { color: black; font-size: 50px; text-decoration: none; position: relative; }
		.icon-item a:hover { color: #333; }
		.tooltip { position: relative; display: inline-block; cursor: pointer; }
		.tooltip .tooltip-text { visibility: hidden; width: 350px; background-color: #d9d9d9; color: #000; text-align: center; font-size: 15px; border-radius: 5px; padding: 10px; position: absolute; z-index: 1; bottom: 50%; left: 50%; margin-left: 0px; opacity: 0; transition: opacity 0.3s; }
		.tooltip:hover .tooltip-text { visibility: visible; opacity: 1; }

		@media (max-width: 768px) {
			.tekst { padding-left: 80px; padding-right: 80px;}
		}

		@media (max-width: 426px) {
			.tekst { padding-left: 40px; padding-right: 40px;}
			.title-overlay h1 { font-size: 50px; }
		}
	</style>
</body>

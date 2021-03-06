<?php do_action( 'bp_before_sidebar' ); ?>

<div id="sidebar-pomodoro-right" class="sidebar col-xs-6 col-sm-6 col-md-3 hidden-xs">
	<!--center><button data-toggle="collapse" data-target="#sidebar_pomodoro_padder"><span class="glyphicon glyphicon-resize-vertical"></span></button></center-->

	<!--button data-toggle="collapse" data-target="#default_sidebar_in" class="collapse_button collapse_right" ><span class="glyphicon glyphicon-resize-horizontal"></span></button-->

	<div class="padder width collapse in" id="sidebar_pomodoro_padder">
		<li>
			<?php 
			force_database_aditional_tables_share(false);
			echo do_shortcode('[product id="5160"]');  
			revert_database_schema();
			#echo do_shortcode("[woocommerce_my_account]");

			global $current_user;
			wp_get_current_user(); 
			?>
			<h3 class="widget-title"><script>document.write(txt_sidebar_stats)</script> <?php echo $current_user->display_name; ?> </h3>
			<?php 
			$produtividade_usuario = user_object_productivity(bp_displayed_user_id());
			?>
			<!--p>Registro</p-->
			<p>
				<span>Membro há <?php echo $produtividade_usuario["sempre"]['totalDias']; ?> dias</span>
				<br>
				<span>Dias de trabalho: <?php echo $produtividade_usuario["sempre"]['diasTrabalhados']; ?> </span>
				<br>
				<span>Dias sem trabalho: <?php echo $produtividade_usuario["sempre"]['diasFolga']; ?> </span>
			</p>
			<!--p>Produtividade</p-->
			<!--p>Dia trabalhados/total dias no período, fator desempenho (%)</p-->
			<p>
				<!--li>Hoje :<?php echo $produtividade_usuario["semana"]['totalDias']; ?> </li-->
				<span>Ultimos sete dias: <?php echo $produtividade_usuario["setedias"]['diasTrabalhados']."/7".", ".($produtividade_usuario["setedias"]['fatorProdutividade']*100)."%"; ?> </span>
				<br>
				<span>Mes atual: <?php echo $produtividade_usuario["mes"]['diasTrabalhados']."/".$produtividade_usuario["mes"]['totalDias'].", ".($produtividade_usuario["mes"]['fatorProdutividade']*100)."%"; ?> </span>
				<br>
				<span>Desde o comeco: <?php echo $produtividade_usuario["sempre"]['diasTrabalhados']."/".$produtividade_usuario["sempre"]['totalDias'].", ".($produtividade_usuario["sempre"]['fatorProdutividade']*100)."%"; ?> </span>
			</p>
			<?php
			/*
			<h4>Comunidade</h4>
			<p>Pomodoros/dia</p>
			<ul>
			<li>Hoje :<?php echo  ?> </li>
			<li>Ultima semana :<?php echo  ?> </li>
			<li>Ultimo mes :<?php echo  ?> </li>
			<li>Ultimo ano :<?php echo  ?> </li>
			<li>Desde o comeco :<?php echo  ?> </li>
			</ul>
			$author_query = array('posts_per_page' => '-1','author' => $current_user->ID);
			$author_posts = new WP_Query($author_query);
			while($author_posts->have_posts()) : $author_posts->the_post();
			?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>       
			
			<?php           
			endwhile;
			?>	
			<p><?php the_author_posts(); ?> pomodoros </p>
			<?php
			//get all posts for an author, then collect all categories
			//for those posts, then display those categories
			/*$cat_array = array();			
			$author_posts = new WP_Query( 'author="'.get_current_user_id().'"&post_status=any&nopaging=true' );
			// The Loop
			if ( $author_posts->have_posts() ) {
			       /* while ( $author_posts->have_posts() ) {
					$author_posts->the_post();
				}*
				//echo $author_posts->post_count;
			} else {
				echo  "Você ainda não completou nenhum pomodoro";
			}
			/* Restore original Post Data *
			wp_reset_postdata();*/
			/*if( $author_posts ) {
				echo count($author_posts);
				/*  foreach ($author_posts as $author_post ) {
				    foreach(get_the_category($author_post->ID) as $category) {
				      $cat_array[$category->term_id] =  $category->term_id;
				    }
			  }
			} else {
				echo  "Você ainda não completou nenhum pomodoro";
			}*/
			//$cat_ids = implode(',', $cat_array);
			//wp_list_categories('include='.$cat_ids.'&title_li=Author Categories');
			?>
		</li>
		<li>
			<h3 class="widget-title">Exportar Calendário</h3>
			<p>Veja seus pomodoros nos calendários da Google, Apple, Microsoft e outros.</p>
			<p><a href="/calendar" class="btn btn-xs">EXPORTAR CALENDÁRIO</a></p>
		</li>
		<li>
			<h3 class="widget-title">Exportar Planilha</h3>
			<p>Tenha controle sobre seus dados, visualize seus pomodoros no Microsoft Excel, LibreOffice Calc e outros.</p>
			<p><a href="/csv" class="btn btn-xs">EXPORTAR PLANILHA</a></p>
		</li>
		<li>
			<h3 class="widget-title"><script>document.write(txt_sidebar_projects)</script></h3>
			<p><?php get_author_post_tags_wpa78489(get_current_user_id());	?></p>
		</li>

		<li>
			<h3 class="widget-title">Spotify</h3>
			<p><iframe src="https://open.spotify.com/user/nsqx6avzxhybkmfumqb1juwmn/playlist/5jtIpYaaFTza3O9ZnaVrLa?si=Wp_OCq20RGOEPj2JFFwYoQ" width="100%" height="300" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></p>
		</li>
		
		<!--li>
			<p><?php the_widget( 'WP_Widget_Tag_Cloud', "title=Projetos da Comunidade", 'before_title=<h3 class="widget-title">&after_title=</h3>' ); ?> </p>
		</li-->
		
	<?php #dynamic_sidebar( 'pomodoros' ); ?>
	</div><!-- .padder -->
</div><!-- #sidebar -->

<?php do_action( 'bp_after_sidebar' ); ?>
	<?php /*
	<h3><script>document.write(txt_tips_heading)</script></h3>
	<p><script>document.write(txt_tips_description)</script></p>
	<input type="button" onclick="proxima_dica()" value="" id="botao_dicas">
	<ul id="dicas">
		<li id="dica_1"><script>document.write(txt_tips_1)</script></li>
		<li id="dica_2"><script>document.write(txt_tips_2)</script></li>
		<li id="dica_3"><script>document.write(txt_tips_3)</script></li>
		<li id="dica_4"><script>document.write(txt_tips_4)</script></li>
		<li id="dica_5"><script>document.write(txt_tips_5)</script></li>
		<li id="dica_6"><script>document.write(txt_tips_6)</script></li>
		<li id="dica_7"><script>document.write(txt_tips_7)</script></li>
		<li id="dica_8"><script>document.write(txt_tips_8)</script></li>
		<li id="dica_9"><script>document.write(txt_tips_9)</script></li>
		<li id="dica_10"><script>document.write(txt_tips_last)</script></li>
	</ul>
	*/ ?>
	

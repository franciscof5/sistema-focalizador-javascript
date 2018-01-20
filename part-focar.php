
<?php get_sidebar(); ?>


<div class="content_pomodoro col-xs-12 col-sm-6">
		
	<div id="pomodoro-painel">		
			
		<div id="pomodoro-relogio">							
		<form><input type="button" value="loading..." onclick="action_button()" id="action_button_id" tabindex="1" disabled="disabled" /></form>

		<div id="relogio">

			<div id="back">
			<div id="upperHalfBack">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/spacer.png" />
				<img id="minutesUpLeftBack" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Up/Left/0.png" class="asd" /><img id="minutesUpRightBack" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Up/Right/0.png"/>
				<img id="secondsUpLeftBack" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Up/Left/0.png" /><img id="secondsUpRightBack" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Up/Right/0.png"/>
			</div>
			<div id="lowerHalfBack">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/spacer.png" />
				<img id="minutesDownLeftBack" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Down/Left/0.png" /><img id="minutesDownRightBack" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Down/Right/0.png" />
				<img id="secondsDownLeftBack" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Down/Left/0.png" /><img id="secondsDownRightBack" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Down/Right/0.png" />
			</div>
			</div>
			<div id="front">
			<div id="upperHalf">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/spacer.png" />
				<img id="minutesUpLeft" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Up/Left/0.png" /><img id="minutesUpRight" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Up/Right/0.png"/>
				<img id="secondsUpLeft" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Up/Left/0.png" /><img id="secondsUpRight" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Up/Right/0.png"/>
			</div>
			<div id="lowerHalf">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/spacer.png" />
				<img id="minutesDownLeft" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Down/Left/0.png" /><img id="minutesDownRight" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Down/Right/0.png" />
				<img id="secondsDownLeft" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Down/Left/0.png" /><img id="secondsDownRight" src="<?php bloginfo('stylesheet_directory'); ?>/pomodoro/Double/Down/Right/0.png" />
			</div>
			</div>
		</div><!--fecha relogio-->
		
		<input type="text" disabled="disabled" id="secondsRemaining_box">
		
		<ul id="pomolist">
			<li class="pomoindi" id="pomoindi1">&nbsp;</li>							
			<li class="pomoindi" id="pomoindi2">&nbsp;</li>
			<li class="pomoindi" id="pomoindi3">&nbsp;</li>
			<li class="pomoindi" id="pomoindi4">&nbsp;</li>
		</ul>
		
		<button onclick="reset_pomodoro_session()" style="margin: 13px 0 0 17px;">0</button>
		
		</div><!--fecha pomodoros painel-->
		<br />
		
		<div id="div_status"><script>document.write(txt_mat_introducing)</script></div>
		<img src="<?php bloginfo('stylesheet_directory'); ?>/images/mascote_foca.png" />
		<br />

		<form name="pomopainel" id="pomopainel">
			<label><script>document.write(txt_write_task_title)</script></label><br />
			<input type="text" size="46" id="title_box" maxlength="70" tabindex="2" name="ti33"></input><br />
			
			<label><script>document.write(txt_write_task_tags)</script></label>
			
			<select id="tags_box" class="js-example-tags " tabindex="3" multiple="multiple" placeholder="Does not work, use data-placeholder with js trick"  data-placeholder="projeto1, projeto2"></select>

			<br />
			<label><script>document.write(txt_write_task_desc)</script></label>
			<textarea rows="4" cols="34" id="description_box" tabindex="4"></textarea><br />
			
			<input type="hidden" id="data_box">
			<input type="hidden" id="status_box">
			<input type="hidden" id="post_id_box">
			<input type="hidden" id="pomodoroAtivoBox" value='<?php echo get_user_meta(get_current_user_id(), "pomodoroAtivo", true); ?>'>
			
			<br />
			<label><script>document.write(txt_write_task_category)</script></label><br />
			<ul>
				<li><input type="radio" name="cat_vl" value="26">Estudo</li>
				<li><input type="radio" name="cat_vl" value="27">Trabalho</li>
				<li><input type="radio" name="cat_vl" value="28">Pessoal</li>
			</ul>
			<label><script>document.write(txt_write_task_privacy)</script></label><br />
			<ul>
				<li><input type="radio" name="priv_vl" value="publish" CHECKED>Público - todos podem ver.</li>
				<li><input type="radio" name="priv_vl" value="private" >Privado - somente você pode ver. </li>
			</ul>
			<input type="button" value="Salvar tarefa" class="btn btn-primary" onclick="save_model()" id="botao-salvar-modelo" />
		</form>

		<h3>Tarefas modelo</h3>
		<p>Ficou mais fácil recomeçar uma tarefa, salve a tarefa como um modelo e reutilize quantas vezes quiser. Confira sua lista de modelos:</p>
		
		
		<ul id="contem-modelos" class="row">
			<?php
			if(function_exists("revert_database_schema"))revert_database_schema();

			$args = array(
		              'post_type' => 'projectimer_focus',
		              'post_status' => 'pending',
		              'author'   => get_current_user_id(),
		              //'orderby'   => 'title',
		              'order'     => 'ASC',
		              'posts_per_page' => -1,
		            );
			$the_query = new WP_Query( $args );
			
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$counter = $post->ID;
				echo '<li id="modelo-carregado-'.$counter.'" class="row">';
				$taglist = "";
				$posttags = get_the_tags();
				  if ($posttags) {
				    foreach($posttags as $tag) {
				    	$taglist.=$tag->name;
				    }
				}
				echo "<div class='col-xs-9'>";
				echo "<strong id=bxtag$counter>".$taglist."</strong> <span id=bxtitle$counter>".get_the_title()."</span>, <span id=bxcontent$counter>".get_the_content()."</span>";
				echo "</div>";
				echo "<div class='col-xs-3'>";
				echo "<input type='button' class='btn btn-xs btn-primary' value='carregar' onclick='load_model($counter)'><br /> <br /><input type='button' class='btn btn-xs btn-success' value='concluir' onclick='delete_model($counter)'>";
				echo "</div>";
				echo '</li>';
				#echo '</ul>';
				
			endwhile;
			// Reset Post Data
			wp_reset_postdata();
			?>
		</ul>
		<div class="row"></div>
	</div>
	
</div><!-- #content -->
<?php locate_template( array( 's-pomodoros.php' ), true ); ?>
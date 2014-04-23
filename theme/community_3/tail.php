
			</div><!--content-->			
		
		</div><!--main-content-->
	</div><!--body-wrapper-->
	<div style='clear:both'></div>
	<div class='footer'>			
			<div class='copyright'>			
				<div class='inner'>					
					<div class='text-info'>						
						<? 
							if ( $footer_text = meta('footer_text') ) echo nl2br($footer_text); 
							else echo "어드민 페이지에서 하단 문구를 입력해 주세요";
						?>
					</div>					
				</div>			
				<div class='comm3_visit_stats'>
					<?
						include widget(
							array(
								'code'		=> 'stat-visit',
								'name'		=> 'stat-visit',
								'git'		=> 'https://github.com/x-widget/stat-visit',
							)
						);
					?>
				</div>				
			</div>							
		</div><!--footer-->
</div><!--layout-->
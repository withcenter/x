
				<style>
						.skin-list {
							display: none;
							margin: 1em 0;
							padding: 0.4em;
							background-color: grey;
						}
						.skin-list > .skin {
							float: left;
							margin: 1em;
							padding: 1em;
							width: 25em;
							background-color: #f0f0f0;
							border: 1px solid grey;
							border-radius: 4px;
							cursor:pointer;
							text-align:center;
						}
						.skin-list > .skin > .preview {
							margin-bottom: 0.4em;
							font-size: 1.6em;
							font-weight: bold;
							color: grey;
						}
						.skin-list > .skin > .folder {
							font-size: 1.2em;
							font-weight: bold;
							color: #0b1f76;
						}
						.skin-list > .skin > .preview > img {
							width: 100%;
						}

						.skin-close, .skin-open {
							cursor:pointer;
							font-weight: bold;
						}
						.skin-close {
							display:none;
						}
						</style>
						<span class='skin-open'><?=ln("Open Skin List", "스킨 목록 열기")?></span>
						<span class='skin-close'><?=ln("Close Skin List", "스킨 목록 닫기")?></span>
						<div class='skin-list'>
						<?php
							$dirs = file::getDirs( x::dir() . '/skin/board' );
							foreach ( $dirs as $dir ) {
								if ( file_exists( x::dir() . "/skin/board/$dir/preview.png" ) ) $img = "<img src='".x::url()."/skin/board/$dir/preview.png'>";
								else $img = "No Preview";
								echo "
									<div class='skin'>
										<div class='preview'>$img</div>
										<div class='folder'>$dir</div>
									</div>
								";
							}
						?>
						<div style='clear:both;'></div>
						</div>
						<script>
						$(function(){
							$(".skin-close").click(function(){
								$('.skin-list').slideUp('fast');
								$(".skin-close").hide();
								$(".skin-open").show();
							});
							
							$(".skin-open").click(function(){
								$('.skin-list').slideDown('fast');
								$(".skin-open").hide();
								$(".skin-close").show();
							});
							$('.skin').click(function(){
								var text = $(this).find('.folder').text();
								$("[name='bo_skin']").val( "x/skin/board/"+text );
								$('.skin-list').slideUp('fast');
							});
						});
						</script>
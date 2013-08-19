<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
		jQuery(document).ready(function() {
			console.log('DMS Options');
			
			jQuery('div.panel-section-options[data-key="section-options"] #local .tab-panel-inner').on('DOMSubtreeModified', function(event) {
					//console.log('Added : ');
					$targ = jQuery(event.target);
					if($targ.attr('class') == 'panel-tab-content')
					{
						$inputs = $targ.find('input');
						if($inputs.length > 0)
						{
							$inputs.each(
									function() {
											$this = jQuery(this);
											if( $this.attr('type')!="text" ) {
												return;
											}
											$this.css({width:'80%'});
											$this.wrap('<div />').parent().append('<input type="button" value="&#164;" class="wmHtmlOverlayEditorButton" style="width:20px;height:24px;margin:0 0 10px 10px;font-size:18px;" />');
											$btn = $this.parent().find('.wmHtmlOverlayEditorButton');
											$btn.button().click(
													function() {
															if(!jQuery('.bootbox').hasClass('in')) {
																bootbox.alert('<div id="wmHtmlOverlayEditorTextareaWrapper" style="width:100%;height:400px;"><textarea id="wmHtmlOverlayEditorTextarea" style="height:300px;">'+$this.val()+'</textarea><input type="hidden" name="wmHtmlOverlayEditorTarget" id="wmHtmlOverlayEditorTarget" value="'+$this.attr('name')+'" /></div>', 
																	function() {
																		$content = tinymce.activeEditor.getContent();//jQuery('#wmHtmlOverlayEditorTextarea').val();
																		$target = jQuery('#wmHtmlOverlayEditorTarget').val();
																		
																		
																		console.log($content);
																		console.log(jQuery('#wmHtmlOverlayEditorTextarea').val());
																		
																		
																		if($content!='') { jQuery('input[name="'+$target+'"]').val($content); }
																	});
																	
																tinymce.init({
																		selector: "#wmHtmlOverlayEditorTextarea",
																		relative_urls : true,
																		document_base_url:  "<?php echo site_url(); ?>/wp-content/plugins/wm-dms-htmleditor/js/tinymce/",
																		plugins: [
																			"advlist autolink lists link image charmap print preview anchor",
																			"searchreplace visualblocks code fullscreen",
																			"insertdatetime media table contextmenu paste"
																		],
																		toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
																	});
															} else {
																window.bootbox.hideAll();
															}
														}
												);
										}
								);
						}
					}
				});
				
		});
</script>
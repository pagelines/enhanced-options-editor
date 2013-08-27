<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
		jQuery(document).ready(function() {
			var editorWorkFlag = false;
			jQuery('div.panel-section-options[data-key="section-options"] .tab-panel-inner').on('DOMSubtreeModified', function(event) {
					if(editorWorkFlag) { return; }
					editorWorkFlag = true;
					
					$targ = jQuery(event.target);
					if($targ.attr('class') == 'panel-tab-content')
					{
						$inputs = $targ.find('input[type="text"],textarea');
						if($inputs.length > 0)
						{
							$inputs.each(
									function() {
											$this = jQuery(this);
											$this.css({width:'82%'}).wrap('<div />').parent().append('<a class="btn" href="#" style="margin:0 0 10px 10px;"><i class="icon-star wmHtmlOverlayEditorButton"></i></a>');
											$btn = $this.next();
											if($btn.length!=0) {
												$btn.button().click(
														function(event) {
																event.preventDefault();
																$this = jQuery(this).parent().find('input,textarea');
																if(!jQuery('.bootbox').hasClass('in')) {
																	bootbox.alert('<div id="wmHtmlOverlayEditorTextareaWrapper" style="width:100%;height:400px;"><textarea id="wmHtmlOverlayEditorTextarea" style="height:360px;">'+$this.val()+'</textarea><input type="hidden" name="wmHtmlOverlayEditorTarget" id="wmHtmlOverlayEditorTarget" value="'+$this.attr('name')+'" /></div>', 
																		function() {
																			$content = tinymce.activeEditor.getContent();
																			$target = jQuery('#wmHtmlOverlayEditorTarget').val();
																			$control = jQuery('input[name="'+$target+'"],textarea[name="'+$target+'"]');
																			if($content!='') { $control.val($content); setTimeout(function() { $control.focus().blur(); }, 200); }
																			tinymce.remove();
																		});
																	tinymce.init({
																			selector: "#wmHtmlOverlayEditorTextarea",
																			relative_urls : true,
																			menubar:false,
																			statusbar: false,
																			document_base_url:  "<?php echo site_url(); ?>/wp-content/plugins/wm-dms-htmleditor/js/tinymce/",
																			plugins: [
																				"advlist autolink lists link image charmap print preview anchor tabfocus",
																				"searchreplace visualblocks code fullscreen",
																				"insertdatetime media table contextmenu paste "
																			],
																			importcss_selector_converter: function(selector) {
																				if(selector.split(' ').length==1) {
																					console.log(selector);
																				}
																			},
																			toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ",
																			tabfocus_elements: ":prev,:next"
																		});
																	tinymce.activeEditor.setContent($this.val());
																} else {
																	$content = tinymce.activeEditor.getContent();
																	$target = jQuery('#wmHtmlOverlayEditorTarget').val();
																	if($content!='') { jQuery('input[name="'+$target+'"]').val($content); }
																	tinymce.remove();
																	window.bootbox.hideAll();
																}
															}
													);
												}
										}
								);
						}
					}
					editorWorkFlag = false;
				});
		});
</script>
<style>
	.modal { z-index:10500; width: 600px; }
	.modal-backdrop { z-index:10400; }
	.modal-body { padding: 0; }
</style>
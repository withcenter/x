
<div class='page-header'>
사이트 생성
</div>
<div class='content'>

			<form action='?'>
				<input type='hidden' name='module' value='site'>
				<input type='hidden' name='action' value='site_create_submit'>
				
				
					<table>
						<tr>
							<td><span class='item'>사이트 주소</span></td>
							<td>http://</td>
							<td><input type='text' name='sub_domain'>.<?=etc::base_domain()?></td>
						</tr>
						<tr>
							<td><span class='item'>사이트 제목</span></td>
							<td></td>
							<td><input type='text' name='title'></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input class='site-create-submit' type='submit' value='생성'></td>
						</tr>
						
					</table>
					
					
					
					
					</form>
			
</div>

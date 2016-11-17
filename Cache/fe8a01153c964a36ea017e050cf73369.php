<html>

	<head>
	
	</head>
	
	<body>
		<table width="100%" border="1">
		<?php foreach($articles as $value) :?>
			<tr>
				<td><?=$value['aid'];?></td>
				<td><?=$value['title'];?></td>
				<td><?=$value['article'];?></td>
			</tr>
		
		<?php endforeach;?>
		
		
	
		</table>
		
		<a href="<?=$page['first'];?>">首页</a>
		<a href="<?=$page['prev'];?>">上一页</a>
		<a href="<?=$page['next'];?>">下一页</a>
		<a href="<?=$page['end'];?>">尾页</a>
	</body>

</html>
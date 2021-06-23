<?php
$arr = [
	[

		'id' => 1,
		'firstName' => 'John',
		'lastName' => 'Snow',
		'age' => 27,
	],
	[
		'id' => 2,
		'firstName' => 'Alex',
		'lastName' => 'Black',
		'age' => 22,
	],
	[
		'id' => 3,
		'firstName' => 'Ivan',
		'lastName' => 'Sidorov',
		'age' => 17,
	],
];

?>

<table>
	<thead>
		<tr>
			<th>
				№
			</th>
			<?php foreach ($arr[0] as $key => $value): ?>
				<th>
					<?= $key ?>
				</th>
			<?php endforeach ?>
		</tr>
	</thead>
	<tbody>
		<?php for ($i = 0; $i < count($arr); $i++): ?>
		<tr>
			<?php if ($i % 2 === 0): ?>
				<td>
					четное
				</td>
			<?php else: ?>
				<td>
					нечетное
				</td>
			<?php endif ?>
			<?php foreach ($arr[$i] as $field) { ?>
				<td>
					<?= $field ?>
				</td>
			<?php } ?>
		</tr>
		<?php endfor ?>
	</tbody>
</table>

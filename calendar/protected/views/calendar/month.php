<!-- This view renders current Month -->
<!-- author Pavan -->
<!--
<?php
$num = cal_days_in_month(CAL_GREGORIAN, 2, 2000); // 31
$running_day = date('w',mktime(0,0,0,2,1,2013));
echo "There was $running_day days in August 2003";

echo mktime(0,0,0,2,1,2013);
?>
-->

<?php
	$this->widget('application.components.Month',array(
		'month'=>2,
		'year'=>2013,
		'monthHeaderHtmlOptions' => array(
						'class'=>'monthheader',
					),
		'monthDaysHtmlOptions' => array(
						'class' => 'monthdays',
					),
		'previousMonthOptions' => array(
						'class' => 'previousMonthDays',
					),
		'presentMonthOptions' => array(
						'class' => 'presentMonthDays',
					),
		'today' => array(
				'id' => 'today',
				),
	));
?>

<!--
<div class="Month">

	<table>
		<tr class="monthheader">
			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>
			<td>

			</td>

			

		</tr>

		<tr class="monthdays">
			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

		</tr>

		<tr class="monthdays">
			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

		</tr>

		<tr class="monthdays">
			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

		</tr>

		<tr class="monthdays">
			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

		</tr>

		<tr class="monthdays">
			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

			<td>

			</td>

		</tr>


	</table>
</div>
-->


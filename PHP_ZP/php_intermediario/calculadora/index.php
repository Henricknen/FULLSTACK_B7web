<form method="GET" action="calc.php">

<input type="number" name="n1" />

<select name="op">
    <option value="+">+</option>
    <option>*</option>      <!-- 'value' pode ser descartado se valor for igual ao que aparece na frente -->
    <option>-</option>
    <option>/</option>
</select>

<input type="number" name="n1" />

<input type="submit" value="Calcular" />

</form>
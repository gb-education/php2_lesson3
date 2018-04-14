{% include 'header.tpl' %}

	<div class="gallery">

		{% for item in data_img %}
			<a href="{{ item.url_img }}" target="_blank">
				<img src="{{ item.url_img_cropped }}">
			</a>
        {% endfor %}

	</div>
	<div class="upload">
		<form action="/" method="POST" enctype="multipart/form-data">
			<input type="file" name="userfile[]" multiple><br><br>
			<input type="submit" name="upload" value="Загрузить">
		</form>
	</div>

{% include 'footer.tpl' %}
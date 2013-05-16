/**
 * File
 * Created    5/15/13 5:15 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

$(function () {
	$('input.add').click(function () {
		addToAlbum($(this).parent());
	});
});

function addToAlbum(data) {
	var title = data.find('i:eq(0)').html(),
		imageSrc = data.find('img:eq(0)').attr('src'),
		fileName = imageSrc.substr(imageSrc.lastIndexOf("/") + 1),
		itemNumber = fileName.split('_')[0],
		item = $.cookie('image_licensing');
	/*
	 item = {};
	 item[itemNumber] = {};
	 item[itemNumber]["title"] = title;
	 item[itemNumber]["src"] = imageSrc;
	 */

	if (typeof item === 'undefined') {
		var item = {};
		alert('undefined');
	} else {
		$.removeCookie('image_licensing');
		alert('deleted');
	}

	item[itemNumber] = {
		"title": title,
		"src"  : imageSrc
	};

	//$.cookie('image_licensing', JSON.stringify(item), {expires: 7, path: '/' });

	$.cookie('image_licensing', JSON.stringify(item));

	var crumbs = $.cookie('image_licensing');

	alert(crumbs);

}
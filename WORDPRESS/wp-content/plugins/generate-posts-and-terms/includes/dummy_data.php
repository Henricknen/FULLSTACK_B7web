<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


function generate_posts_and_terms__new_post_dummy_titles( $titles = array() ) {
	
	// List is with 100 Lorem Ipsum dummy titles
	$titles[] = 'Lorem ipsum dolor sit amet consectetuer';
	$titles[] = 'Adipiscing elit sed diam nonummy nibh';
	$titles[] = 'Tincidunt ut laoreet dolore magna';
	$titles[] = 'Aliquam erat volutpat ut wisi enim';
	$titles[] = 'Minim veniam quis nostrud exerci';
	$titles[] = 'Tation ullamcorper suscipit lobortis nisl ut';
	$titles[] = 'Ex ea commodo consequat duis';
	$titles[] = 'Autem vel eum iriure dolor in';
	$titles[] = 'In vulputate velit esse molestie';
	$titles[] = 'Consequat vel illum dolore eu feugiat';
	$titles[] = 'Facilisis at vero eros et';
	$titles[] = 'Accumsan et iusto odio dignissim qui';
	$titles[] = 'Praesent luptatum zzril delenit augue';
	$titles[] = 'Duis dolore te feugait nulla facilisiepsum';
	$titles[] = 'Non deposit quid pro quo';
	$titles[] = 'Hic escorol olypian quarrels et gorilla';
	$titles[] = 'Sic ad nauseum souvlaki ignitus';
	$titles[] = 'Carborundum e pluribus unum defacto lingo';
	$titles[] = 'Igpay atinlay marquee selectus non';
	$titles[] = 'Provisio incongruous feline nolo contendre gratuitous';
	$titles[] = 'Niacin sodium glutimate quote meon';
	$titles[] = 'An estimate et non interruptus stadium';
	$titles[] = 'Tempus fugit esperanto hiccup estrogen';
	$titles[] = 'Glorious baklava ex librus hup hey';
	$titles[] = 'Infinitum non sequitur condominium facile';
	$titles[] = 'Et geranium incognito epsum factorial non';
	$titles[] = 'Quid pro quo hic escorol';
	$titles[] = 'Marquee selectus non provisio incongruous feline';
	$titles[] = 'Contendre olypian quarrels et gorilla';
	$titles[] = 'Congolium sic ad nauseum souvlaki ignitus';
	$titles[] = 'E pluribus unumli europan lingues';
	$titles[] = 'Es membres del sam familie lor';
	$titles[] = 'Existentie es un myth por';
	$titles[] = 'Scientie musica sport etc li tot';
	$titles[] = 'Usa li sam vocabularium li';
	$titles[] = 'Lingues differe solmen in li grammatica';
	$titles[] = 'Pronunciation e li plu commun';
	$titles[] = 'Vocabules omnicos directe al desirabilita de';
	$titles[] = 'Nov lingua franca on refusa';
	$titles[] = 'Continuar payar custosi traductores it solmen';
	$titles[] = 'Esser necessi far uniform grammatica';
	$titles[] = 'Pronunciation e plu sommun parolesma quande';
	$titles[] = 'Coalesce li grammatica del resultant';
	$titles[] = 'Lingue es plu simplic e regulari';
	$titles[] = 'Ti del coalescent lingues li';
	$titles[] = 'Nov lingua franca va esser plu';
	$titles[] = 'E regulari quam li existent';
	$titles[] = 'Europan lingues it va esser tam';
	$titles[] = 'Quam occidental in fact it';
	$titles[] = 'Va esser occidental a un angleso';
	$titles[] = 'Va semblar un simplificat angles';
	$titles[] = 'Quam un skeptic cambridge amico dit';
	$titles[] = 'Que occidental lorem ipsum dolor';
	$titles[] = 'Sit amet consectetuer adipiscing elit sed';
	$titles[] = 'Nonummy nibh euismod tincidunt ut';
	$titles[] = 'Laoreet dolore magna aliquam erat volutpat';
	$titles[] = 'Wisi enim ad minim veniam';
	$titles[] = 'Quis nostrud exerci tation ullamcorper suscipit';
	$titles[] = 'Nisl ut aliquip ex ea';
	$titles[] = 'Commodo consequat duis autem vel eum';
	$titles[] = 'Dolor in hendrerit in vulputate';
	$titles[] = 'Velit esse molestie consequat vel illum';
	$titles[] = 'Eu feugiat nulla facilisis at';
	$titles[] = 'Vero eros et accumsan et iusto';
	$titles[] = 'Dignissim qui blandit praesent luptatum';
	$titles[] = 'Zzril delenit augue duis dolore te';
	$titles[] = 'Nulla facilisiepsum factorial non deposit';
	$titles[] = 'Quid pro quo hic escorol olypian';
	$titles[] = 'Et gorilla congolium sic ad';
	$titles[] = 'Nauseum souvlaki ignitus carborundum e pluribus';
	$titles[] = 'Defacto lingo est igpay atinlay';
	$titles[] = 'Marquee selectus non provisio incongruous feline';
	$titles[] = 'Contendre gratuitous octopus niacin sodium';
	$titles[] = 'Glutimate quote meon an estimate et';
	$titles[] = 'Interruptus stadium sic tempus fugit';
	$titles[] = 'Esperanto hiccup estrogen glorious baklava ex';
	$titles[] = 'Hup hey ad infinitum non';
	$titles[] = 'Sequitur condominium facile et geranium incognito';
	$titles[] = 'Factorial non deposit quid pro';
	$titles[] = 'Quo hic escorol marquee selectus non';
	$titles[] = 'Incongruous feline nolo contendre olypian';
	$titles[] = 'Quarrels et gorilla congolium sic ad';
	$titles[] = 'Souvlaki ignitus carborundum e pluribus';
	$titles[] = 'Unumli europan lingues es membres del';
	$titles[] = 'Familie lor separat existentie es';
	$titles[] = 'Un myth por scientie musica sport';
	$titles[] = 'Li tot europa usa li';
	$titles[] = 'Sam vocabularium li lingues differe solmen';
	$titles[] = 'Li grammatica li pronunciation e';
	$titles[] = 'Li plu commun vocabules omnicos directe';
	$titles[] = 'Desirabilita de un nov lingua';
	$titles[] = 'Franca on refusa continuar payar custosi';
	$titles[] = 'It solmen va esser necessi';
	$titles[] = 'Far uniform grammatica pronunciation e plu';
	$titles[] = 'Parolesma quande lingues coalesce li';
	$titles[] = 'Grammatica del resultant lingue es plu';
	$titles[] = 'E regulari quam ti del';
	$titles[] = 'Coalescent lingues li nov lingua franca';
	$titles[] = 'Esser plu simplic e regulari';
	$titles[] = 'Quam li existent europan lingues it';

	return $titles;
}


function generate_posts_and_terms__new_post_dummy_text( $text = array() ) {

	// 0
	$text[] = array(
		'title' => __( 'Headings', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_headings()
	);
	
	// 1
	$text[] = array(
		'title' => __( 'Blockquotes', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_blockquotes()
	);

	// 2
	$text[] = array(
		'title' => __( 'Tables', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_tables()
	);
	
	// 3
	$text[] = array(
		'title' => __( 'Definition Lists', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_definition_lists()
	);
	
	// 4
	$text[] = array(
		'title' => __( 'Unordered Lists (Nested)', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_unordered_lists()
	);
	
	// 5
	$text[] = array(
		'title' => __( 'Ordered List (Nested)', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_ordered_lists()
	);
	
	// 6
	$text[] = array(
		'title' => __( 'HTML Tags', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_html_tags()
	);
	
	// 7
	$text[] = array(
		'title' => __( 'No Aligned Image', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_no_aligned_image()
	);
	
	// 8
	$text[] = array(
		'title' => __( 'Centered Image', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_centered_image()
	);
	
	// 9
	$text[] = array(
		'title' => __( 'Left Aligned Image', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_left_aligned_image()
	);
	
	// 10
	$text[] = array(
		'title' => __( 'Right Aligned Image', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_right_aligned_image()
	);
	
	// 11
	$text[] = array(
		'title' => __( 'Default Text', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_no_aligned_text()
	);
	
	// 12
	$text[] = array(
		'title' => __( 'Left Aligned Text', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_left_aligned_text()
	);
	
	// 13
	$text[] = array(
		'title' => __( 'Right Aligned Text', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_right_aligned_text()
	);
	
	// 14
	$text[] = array(
		'title' => __( 'Justify Aligned Text', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_justify_aligned_text()
	);
	
	// 15
	$text[] = array(
		'title' => __( 'More Tag', 'generate_posts_and_terms' ),
		'data'  => generate_posts_and_terms__dummy_text_more_tag()
	);

	return $text;
}


function generate_posts_and_terms__dummy_text_headings() {
	
	$headings = '<h1>Header one</h1>' . "\n";
	$headings .= '<h2>Header two</h2>' . "\n";
	$headings .= '<h3>Header three</h3>' . "\n";
	$headings .= '<h4>Header four</h4>' . "\n";
	$headings .= '<h5>Header five</h5>' . "\n";
	$headings .= '<h6>Header six</h6>';

	return $headings;
}


function generate_posts_and_terms__dummy_text_blockquotes() {
	
	$blockquotes = 'Single line blockquote:' . "\n";
	$blockquotes .= '<blockquote>Stay hungry. Stay foolish.</blockquote>' . "\n";
	$blockquotes .= 'Multi line blockquote with a cite reference:' . "\n";
	$blockquotes .= '<blockquote>People think focus means saying yes to the thing you&#39;ve got to focus on. But that&#39;s not what it means at all. It means saying no to the hundred other good ideas that there are. You have to pick carefully. I&#39;m actually as proud of the things we haven&#39;t done as the things I have done. Innovation is saying no to 1,000 things. <cite>Steve Jobs - Apple Worldwide Developers&#39; Conference, 1997</cite></blockquote>' . "\n";

	return $blockquotes;
}

function generate_posts_and_terms__dummy_text_tables() {
	
	$tables = '<table>' . "\n";
	$tables .= '	<thead>' . "\n";
	$tables .= '		<tr>' . "\n";
	$tables .= '			<th>Employee</th>' . "\n";
	$tables .= '			<th>Salary</th>' . "\n";
	$tables .= '			<th></th>' . "\n";
	$tables .= '		</tr>' . "\n";
	$tables .= '	</thead>' . "\n";
	$tables .= '	<tbody>' . "\n";
	$tables .= '		<tr>' . "\n";
	$tables .= '			<th><a href="http://example.org/">John Doe</a></th>' . "\n";
	$tables .= '			<td>$1</td>' . "\n";
	$tables .= '			<td>Because that&#39;s all Steve Jobs needed for a salary.</td>' . "\n";
	$tables .= '		</tr>' . "\n";
	$tables .= '		<tr>' . "\n";
	$tables .= '			<th><a href="http://example.org/">Jane Doe</a></th>' . "\n";
	$tables .= '			<td>$100K</td>' . "\n";
	$tables .= '			<td>For all the blogging she does.</td>' . "\n";
	$tables .= '		</tr>' . "\n";
	$tables .= '		<tr>' . "\n";
	$tables .= '			<th><a href="http://example.org/">Fred Bloggs</a></th>' . "\n";
	$tables .= '			<td>$100M</td>' . "\n";
	$tables .= '			<td>Pictures are worth a thousand words, right? So Jane x 1,000.</td>' . "\n";
	$tables .= '		</tr>' . "\n";
	$tables .= '		<tr>' . "\n";
	$tables .= '			<th><a href="http://example.org/">Jane Bloggs</a></th>' . "\n";
	$tables .= '			<td>$100B</td>' . "\n";
	$tables .= '			<td>With hair like that?! Enough said...</td>' . "\n";
	$tables .= '		</tr>' . "\n";
	$tables .= '	</tbody>' . "\n";
	$tables .= '</table>';

	return $tables;
}


function generate_posts_and_terms__dummy_text_definition_lists() {
	
	$definition_lists = '<dl><dt>Definition List Title</dt><dd>Definition list division.</dd><dt>Startup</dt><dd>A startup company or startup is a company or temporary organization designed to search for a repeatable and scalable business model.</dd><dt>#dowork</dt><dd>Coined by Rob Dyrdek and his personal body guard Christopher "Big Black" Boykins, "Do Work" works as a self motivator, to motivating your friends.</dd><dt>Do It Live</dt><dd>I&#39;ll let Bill O&#39;Reilly will <a title="We&#39;ll Do It Live" href="https://www.youtube.com/watch?v=O_HyZ5aW76c">explain</a> this one.</dd></dl>';
	
	return $definition_lists;
}


function generate_posts_and_terms__dummy_text_unordered_lists() {
	
	$unordered_lists = '<ul>' . "\n";
	
	$unordered_lists .= '	<li>List item one' . "\n";
	
	$unordered_lists .= '<ul>' . "\n";
	
	$unordered_lists .= '	<li>List item one' . "\n";
	
	$unordered_lists .= '<ul>' . "\n";
	
	$unordered_lists .= '	<li>List item one</li>' . "\n";
	$unordered_lists .= '	<li>List item two</li>' . "\n";
	$unordered_lists .= '	<li>List item three</li>' . "\n";
	$unordered_lists .= '	<li>List item four</li>' . "\n";
	
	$unordered_lists .= '</ul>' . "\n";
	$unordered_lists .= '</li>' . "\n";
	
	$unordered_lists .= '	<li>List item two</li>' . "\n";
	$unordered_lists .= '	<li>List item three</li>' . "\n";
	$unordered_lists .= '	<li>List item four</li>' . "\n";
	
	$unordered_lists .= '</ul>' . "\n";
	$unordered_lists .= '</li>' . "\n";
	
	$unordered_lists .= '	<li>List item two</li>' . "\n";
	$unordered_lists .= '	<li>List item three</li>' . "\n";
	$unordered_lists .= '	<li>List item four</li>' . "\n";
	
	$unordered_lists .= '</ul>';
	
	return $unordered_lists;
}


function generate_posts_and_terms__dummy_text_ordered_lists() {
	
	$ordered_lists = '<ol>' . "\n";
	
	$ordered_lists .= '	<li>List item one' . "\n";
	
	$ordered_lists .= '<ol>' . "\n";
	
	$ordered_lists .= '	<li>List item one' . "\n";
	
	$ordered_lists .= '<ol>' . "\n";
	
	$ordered_lists .= '	<li>List item one</li>' . "\n";
	$ordered_lists .= '	<li>List item two</li>' . "\n";
	$ordered_lists .= '	<li>List item three</li>' . "\n";
	$ordered_lists .= '	<li>List item four</li>' . "\n";
	
	$ordered_lists .= '</ol>' . "\n";
	$ordered_lists .= '</li>' . "\n";
	
	$ordered_lists .= '	<li>List item two</li>' . "\n";
	$ordered_lists .= '	<li>List item three</li>' . "\n";
	$ordered_lists .= '	<li>List item four</li>' . "\n";
	
	$ordered_lists .= '</ol>' . "\n";
	$ordered_lists .= '</li>' . "\n";
	
	$ordered_lists .= '	<li>List item two</li>' . "\n";
	$ordered_lists .= '	<li>List item three</li>' . "\n";
	$ordered_lists .= '	<li>List item four</li>' . "\n";
	
	$ordered_lists .= '</ol>';
	
	return $ordered_lists;
}


function generate_posts_and_terms__dummy_text_html_tags() {
	
	$html_tags = 'These supported tags come from the WordPress.com code <a title="Code" href="http://en.support.wordpress.com/code/">FAQ</a>.' . "\n\n";

	// Address Tag
	$html_tags .= '<strong>Address Tag</strong>' . "\n";
	$html_tags .= '<address>1 Infinite Loop' . "\n";
	$html_tags .= 'Cupertino, CA 95014' . "\n";
	$html_tags .= 'United States</address>' . "\n\n";;
	
	// Anchor Tag
	$html_tags .= '<strong>Anchor Tag (aka. Link)</strong>' . "\n";
	$html_tags .= 'This is an example of a <a title="Apple" href="http://apple.com">link</a>.' . "\n\n";

	// Abbreviation Tag
	$html_tags .= '<strong>Abbreviation Tag</strong>' . "\n";
	$html_tags .= 'The abbreviation <abbr title="Seriously">srsly</abbr> stands for "seriously".' . "\n\n";

	// Acronym Tag
	$html_tags .= '<strong>Acronym Tag (<em>deprecated in HTML5</em>)</strong>' . "\n";
	$html_tags .= 'The acronym <acronym title="For The Win">ftw</acronym> stands for "for the win".' . "\n\n";

	// Big Tag
	$html_tags .= '<strong>Big Tag (<em>deprecated in HTML5</em>)</strong>' . "\n";
	$html_tags .= 'These tests are a <big>big</big> deal, but this tag is no longer supported in HTML5.' . "\n\n";

	// Cite Tag
	$html_tags .= '<strong>Cite Tag</strong>' . "\n";
	$html_tags .= '"Code is poetry." --<cite>Automattic</cite>' . "\n\n";

	// Code Tag
	$html_tags .= '<strong>Code Tag</strong>' . "\n";
	$html_tags .= 'You will learn later on in these tests that <code>word-wrap: break-word;</code> will be your best friend.' . "\n\n";

	// Delete Tag
	$html_tags .= '<strong>Delete Tag</strong>' . "\n";
	$html_tags .= 'This tag will let you <del>strikeout text</del>, but this tag is no longer supported in HTML5 (use the <code>&lt;strike&gt;</code> instead).' . "\n\n";

	// Emphasize Tag
	$html_tags .= '<strong>Emphasize Tag</strong>' . "\n";
	$html_tags .= 'The emphasize tag should <em>italicize</em> text.' . "\n\n";

	// Insert Tag
	$html_tags .= '<strong>Insert Tag</strong>' . "\n";
	$html_tags .= 'This tag should denote <ins>inserted</ins> text.' . "\n\n";

	// Keyboard Tag
	$html_tags .= '<strong>Keyboard Tag</strong>' . "\n";
	$html_tags .= 'This scarsly known tag emulates <kbd>keyboard text</kbd>, which is usually styled like the <code>&lt;code&gt;</code> tag.' . "\n\n";

	// Preformatted Tag
	$html_tags .= '<strong>Preformatted Tag</strong>' . "\n";
	$html_tags .= 'This tag styles large blocks of code.' . "\n";
	$html_tags .= '<pre>.post-title {' . "\n";
	$html_tags .= '	margin: 0 0 5px;' . "\n";
	$html_tags .= '	font-weight: bold;' . "\n";
	$html_tags .= '	font-size: 38px;' . "\n";
	$html_tags .= '	line-height: 1.2;' . "\n";
	$html_tags .= '	and here&#39;s a line of some really, really, really, really long text, just to see how the PRE tag handles it and to find out how it overflows;' . "\n";
	$html_tags .= '}</pre>' . "\n\n";
	
	// Quote Tag
	$html_tags .= '<strong>Quote Tag</strong>' . "\n";
	$html_tags .= '<q>Developers, developers, developers...</q> --Steve Ballmer' . "\n\n";

	// Strike Tag
	$html_tags .= '<strong>Strike Tag (<em>deprecated in HTML5</em>)</strong></strong>' . "\n";
	$html_tags .= 'This tag shows <span style="text-decoration:line-through;">strike-through text</span>' . "\n\n";

	// Strong Tag
	$html_tags .= '<strong>Strong Tag</strong>' . "\n";
	$html_tags .= 'This tag shows <strong>bold text.</strong>' . "\n\n";

	// Subscript Tag
	$html_tags .= '<strong>Subscript Tag</strong>' . "\n";
	$html_tags .= 'Getting our science styling on with H<sub>2</sub>O, which should push the "2" down.' . "\n\n";

	// Superscript Tag
	$html_tags .= '<strong>Superscript Tag</strong>' . "\n";
	$html_tags .= 'Still sticking with science and Isaac Newton&#39;s E = MC<sup>2</sup>, which should lift the 2 up.' . "\n\n";

	// Teletype Tag
	$html_tags .= '<strong>Teletype Tag (<em>deprecated in HTML5</em>)</strong>' . "\n";
	$html_tags .= 'This rarely used tag emulates <tt>teletype text</tt>, which is usually styled like the <code>&lt;code&gt;</code> tag.' . "\n\n";

	// Variable Tag
	$html_tags .= '<strong>Variable Tag</strong>' . "\n";
	$html_tags .= 'This allows you to denote <var>variables</var>.';

	return $html_tags;
}


function generate_posts_and_terms__dummy_text_no_aligned_image() {
	
	$no_aligned_image = 'And now for a <em><strong>massively large image</strong></em>. It also has <em><strong>no alignment</strong></em>.' . "\n";

	$no_aligned_image .= '[caption id="attachment_907" align="alignnone" width="1200"]<img class=" wp-image-907" title="Image Alignment 1200x400" alt="Image Alignment 1200x400" src="http://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-1200x4002.jpg" width="1200" height="400" /> Massive image comment for your eyeballs.[/caption]' . "\n";

	$no_aligned_image .= 'The image above, though 1200px wide, should not overflow the content area. It should remain contained with no visible disruption to the flow of content.';
	
	return $no_aligned_image;
}


function generate_posts_and_terms__dummy_text_centered_image() {
	
	$centered_image = '[caption id="attachment_906" align="aligncenter" width="580"]<img class="size-full wp-image-906  " title="Image Alignment 580x300" alt="Image Alignment 580x300" src="http://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-580x300.jpg" width="580" height="300" /> Look at 580x300 getting some <a title="Image Settings" href="http://en.support.wordpress.com/images/image-settings/">caption</a> love.[/caption]' . "\n";

	$centered_image .= 'The image above happens to be <em><strong>centered</strong></em>. The caption also has a link in it, just to see if it does anything funky.';
	
	return $centered_image;
}


function generate_posts_and_terms__dummy_text_left_aligned_image() {
	
	$left_aligned_image = 'The image above happens to be <em><strong>centered</strong></em>. The caption also has a link in it, just to see if it does anything funky.' . "\n";

	$left_aligned_image .= '[caption id="attachment_904" align="alignleft" width="150"]<img class="size-full wp-image-904" title="Image Alignment 150x150" alt="Image Alignment 150x150" src="http://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-150x150.jpg" width="150" height="150" /> Itty-bitty caption.[/caption]' . "\n";

	$left_aligned_image .= 'The rest of this paragraph is filler for the sake of seeing the text wrap around the 150x150 image, which is <em><strong>left aligned</strong></em>.' . "\n";

	$left_aligned_image .= 'As you can see the should be some space above, below, and to the right of the image. The text should not be creeping on the image. Creeping is just not right. Images need breathing room too. Let them speak like you words. Let them do their jobs without any hassle from the text. In about one more sentence here, we&#39;ll see that the text moves from the right of the image down below the image in seamless transition. Again, letting the do it&#39;s thang. Mission accomplished!';
	
	return $left_aligned_image;
}


function generate_posts_and_terms__dummy_text_right_aligned_image() {
	
	$right_aligned_image = '[caption id="attachment_905" align="alignright" width="300"]<img class="size-full wp-image-905" title="Image Alignment 300x200" alt="Image Alignment 300x200" src="http://wpthemetestdata.files.wordpress.com/2013/03/image-alignment-300x200.jpg" width="300" height="200" /> Feels good to be right all the time.[/caption]' . "\n";

	$right_aligned_image .= 'And now we&#39;re going to shift things to the <em><strong>right align</strong></em>. Again, there should be plenty of room above, below, and to the left of the image. Just look at him there... Hey guy! Way to rock that right side. I don&#39;t care what the left aligned image says, you look great. Don&#39;t let anyone else tell you differently.' . "\n";

	$right_aligned_image .= 'In just a bit here, you should see the text start to wrap below the right aligned image and settle in nicely. There should still be plenty of room and everything should be sitting pretty. Yeah... Just like that. It never felt so good to be right.';

	return $right_aligned_image;
}


function generate_posts_and_terms__dummy_text_no_aligned_text() {
	
	$no_aligned_text = 'This is a paragraph. It should not have any alignment of any kind. It should just flow like you would normally expect. Nothing fancy. Just straight up text, free flowing, with love. Completely neutral and not picking a side or sitting on the fence. It just is. It just freaking is. It likes where it is. It does not feel compelled to pick a side. Leave him be. It will just be better that way. Trust me.';
	
	return $no_aligned_text;
}
	

function generate_posts_and_terms__dummy_text_left_aligned_text() {
	
	$left_aligned_text = '<p style="text-align:left;">This is a paragraph. It is left aligned. Because of this, it is a bit more liberal in it&#39;s views. It&#39;s favorite color is green. Left align tends to be more eco-friendly, but it provides no concrete evidence that it really is. Even though it likes share the wealth evenly, it leaves the equal distribution up to justified alignment.</p>';
	
	return $left_aligned_text;
}


function generate_posts_and_terms__dummy_text_right_aligned_text() {
	
	$right_aligned_text = '<p style="text-align:right;">This is a paragraph. It is right aligned. It is a bit more conservative in it&#39;s views. It&#39;s prefers to not be told what to do or how to do it. Right align totally owns a slew of guns and loves to head to the range for some practice. Which is cool and all. I mean, it&#39;s a pretty good shot from at least four or five football fields away. Dead on. So boss.</p>';
	
	return $right_aligned_text;
}


function generate_posts_and_terms__dummy_text_justify_aligned_text() {
	
	$justify_aligned_text = '<p style="text-align:justify;">This is a paragraph. It is justify aligned. It gets really mad when people associate it with Justin Timberlake. Typically, justified is pretty straight laced. It likes everything to be in it&#39;s place and not all cattywampus like the rest of the aligns. I am not saying that makes it better than the rest of the aligns, but it does tend to put off more of an elitist attitude.</p>';
	
	return $justify_aligned_text;
}


function generate_posts_and_terms__dummy_text_more_tag() {
	
	$justify_aligned_text = 'This content is before the <a title="The More Tag" href="http://en.support.wordpress.com/splitting-content/more-tag/" target="_blank">more tag</a>.' . "\n\n";
	$justify_aligned_text .= 'Right after this sentence should be a "continue reading" button of some sort.' . "\n\n";
	$justify_aligned_text .= '<!--more-->' . "\n\n";
	$justify_aligned_text .= 'And this content is after the more tag.';
	
	return $justify_aligned_text;
}
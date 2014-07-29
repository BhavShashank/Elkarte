<?php

/**
 * Manage features and options administration page.
 *
 * @name      ElkArte Forum
 * @copyright ElkArte Forum contributors
 * @license   BSD http://opensource.org/licenses/BSD-3-Clause
 *
 * This software is a derived product, based on:
 *
 * Simple Machines Forum (SMF)
 * copyright:	2011 Simple Machines (http://www.simplemachines.org)
 * license:		BSD, See included LICENSE.TXT for terms and conditions.
 *
 * @version 1.0 Release Candidate 2
 *
 */

function template_lp_stats() {
	global $context, $txt, $sourcedir, $settings, $user_info, $options, $scripturl;

	echo '
	<div class="like_post_stats">

		<div class="category_header">
			<h3 class="floatleft">
			', $txt['like_post_stats'] ,'
			</h3>
		</div>

		<p class="description">
			', $context['like_posts']['tab_desc'] ,'
		</p>';

	if(empty($context['like_post_stats_error'])) {
		echo '
		<ul class="like_post_stats_menu buttonlist" role="menubar">';

		// Print out all the items in this tab.
		foreach ($context['lp_stats_tabs'] as $sa => $tab) {
			echo '
			<li role="menuitem">
				<a class="linklevel1 button_strip_markread" href="" id="', $tab['id'],'">
					', $tab['label'], '
				</a>
			</li>';
		}

		echo '
		</ul>';
	}

	if(empty($context['like_post_stats_error'])) {
		echo '
		<div class="forum_category">
			<h2 class="category_header" id="like_post_current_tab">
			</h2>
			<div class="board_row">
				<div class="like_post_stats_data">
					<div class="individual_data like_post_message_data"></div>
					<div class="individual_data like_post_topic_data"></div>
					<div class="individual_data like_post_board_data"></div>
					<div class="individual_data like_post_most_liked_user_data"></div>
					<div class="individual_data like_post_most_likes_given_user_data"></div>
					<div class="individual_data like_post_stats_error"></div>
				</div>
			</div>
		</div>';

		echo '
			<div id="like_post_stats_overlay"></div>
			<div id="lp_preloader"></div>';
	} else {
		echo '
		<div id="admincenter">
			<div class="windowbg2">
				<span class="topslice"><span></span></span>
					<div class="content">', $context['like_post_stats_error'] ,'</div>
				<span class="botslice"><span></span></span>
			</div>
		</div>';
	}

	echo '
	</div>';

	echo '<script type="text/javascript"><!-- // --><![CDATA[
		window.onload = function() {
			likePostStats.prototype.init({
				onError: ' . JavaScriptEscape($context['like_post_stats_error']) . ',
				txtStrings: {
					topic: ' . JavaScriptEscape($txt['like_post_topic']) . ',
					message: ' . JavaScriptEscape($txt['like_post_message']) . ',
					board: ' . JavaScriptEscape($txt['like_post_board']) . ',
					totalPosts: ' . JavaScriptEscape($txt['like_post_total_posts']) . ',
					postedAt: ' . JavaScriptEscape($txt['like_post_posted_at']) . ',
					readMore: ' . JavaScriptEscape($txt['like_post_read_more']) . ',
					genricHeading1: ' . JavaScriptEscape($txt['like_post_generic_heading1']) . ',
					totalLikesReceived: ' . JavaScriptEscape($txt['like_post_total_likes_received']) . ',
					mostLikedMessage: ' . JavaScriptEscape($txt['like_post_tab_mlm']) . ',
					mostLikedTopic: ' . JavaScriptEscape($txt['like_post_tab_mlt']) . ',
					mostLikedBoard: ' . JavaScriptEscape($txt['like_post_tab_mlb']) . ',
					mostLikedMember: ' . JavaScriptEscape($txt['like_post_tab_mlmember']) . ',
					mostLikeGivingMember: ' . JavaScriptEscape($txt['like_post_tab_mlgmember']) . ',
					usersWhoLiked: ' . JavaScriptEscape($txt['like_post_users_who_liked']) . ',
					mostPopularTopicHeading1: ' . JavaScriptEscape($txt['like_post_most_popular_topic_heading1']) . ',
					mostPopularTopicSubHeading1: ' . JavaScriptEscape($txt['like_post_most_popular_topic_sub_heading1']) . ',
					mostPopularTopicSubHeading2: ' . JavaScriptEscape($txt['like_post_most_popular_topic_sub_heading2']) . ',
					mostPopularBoardHeading1: ' . JavaScriptEscape($txt['like_post_most_popular_board_heading1']) . ',
					mostPopularBoardSubHeading1: ' . JavaScriptEscape($txt['like_post_most_popular_board_sub_heading1']) . ',
					mostPopularBoardSubHeading2: ' . JavaScriptEscape($txt['like_post_most_popular_board_sub_heading2']) . ',
					mostPopularBoardSubHeading3: ' . JavaScriptEscape($txt['like_post_most_popular_board_sub_heading3']) . ',
					mostPopularBoardSubHeading4: ' . JavaScriptEscape($txt['like_post_most_popular_board_sub_heading4']) . ',
					mostPopularBoardSubHeading5: ' . JavaScriptEscape($txt['like_post_most_popular_board_sub_heading5']) . ',
					mostPopularBoardSubHeading6: ' . JavaScriptEscape($txt['like_post_most_popular_board_sub_heading6']) . ',
					mostPopularUserHeading1: ' . JavaScriptEscape($txt['like_post_most_popular_user_heading1']) . ',
					likesReceived: ' . JavaScriptEscape($txt['like_post_liked_by_others']) . ',
					totalLikesGiven: ' . JavaScriptEscape($txt['like_post_total_likes_given']) . ',
					mostLikeGivenUserHeading1: ' . JavaScriptEscape($txt['like_post_most_like_given_user_heading1']) . ',
				}
			});
		}
	// ]]></script>';
}

?>

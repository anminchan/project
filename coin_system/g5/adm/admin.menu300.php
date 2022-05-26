<?php
$menu['menu300'] = array (
    array('300000', '게시판관리', ''.G5_ADMIN_URL.'/board_list.php', 'board'),
    array('300100', '게시판관리', ''.G5_ADMIN_URL.'/board_list.php', 'bbs_board'),
    array('300200', '게시판그룹관리', ''.G5_ADMIN_URL.'/boardgroup_list.php', 'bbs_group'),
    array('300300', '인기검색어관리', ''.G5_ADMIN_URL.'/popular_list.php', 'bbs_poplist', 1),
    array('300400', '인기검색어순위', ''.G5_ADMIN_URL.'/popular_rank.php', 'bbs_poprank', 1),
    array('300500', '1:1문의설정', ''.G5_ADMIN_URL.'/qa_config.php', 'qa'),
    array('300600', '내용관리', G5_ADMIN_URL.'/contentlist.php', 'scf_contents', 1),
    array('300700', 'FAQ관리', G5_ADMIN_URL.'/faqmasterlist.php', 'scf_faq', 1),
    array('300820', '글,댓글 현황', G5_ADMIN_URL.'/write_count.php', 'scf_write_count'),

    array('300901', '업체등록', G5_ADMIN_URL.'/seller_form.php', 'seller'),
    array('300902', '영업VIEW등록', G5_ADMIN_URL.'/seller_manager_form.php', 'seller_manager'),
    array('300903', '업체기간별현황', G5_ADMIN_URL.'/seller_reqcalculate_duration.php', 'seller_reqcalculate_duration'),

    array('300970', '구매한도설정', G5_ADMIN_URL.'/salelimitform.php', 'accountlist'),
    array('300900', '계좌관리', G5_ADMIN_URL.'/accountlist.php', 'accountlist'),
    array('300950', 'VIEW ADMIN 등록', G5_ADMIN_URL.'/manageraddform.php', 'managerform'),
    array('300910', '코인구매관리', G5_ADMIN_URL.'/coin_reqlist.php', 'coin_reqlist'),
    array('300980', '코인전환관리', G5_ADMIN_URL.'/coin_changelist.php', 'coin_changelist'),
    array('300920', '지갑입출금 내역', G5_ADMIN_URL.'/coin_reqinoutlist.php', 'coin_req_inout'),
    array('300930', '정산', G5_ADMIN_URL.'/coin_reqcalculatelist.php', 'coin_req_calculate'),
    array('300940', '과거데이터 내역', G5_ADMIN_URL.'/coin_reqhistorylist.php', 'coin_req_history'),
    array('300960', '유저코인로그', G5_ADMIN_URL.'/coin_accessloglist.php', 'coin_accesslog'),
    array('300990', '기간별매출현황', G5_ADMIN_URL.'/coin_reqcalculate_duration.php', 'coin_reqcalculate_duration'),

);
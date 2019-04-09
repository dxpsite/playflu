--
-- Структура таблицы `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `tmdb` int(11) NOT NULL,
  `media_order` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `duration_custom` int(11) NOT NULL,
  `s_time` int(11) NOT NULL,
  `e_time` int(11) NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `stored` int(1) DEFAULT '0',
  `encoded` int(1) DEFAULT '0',
  `onair` int(1) NOT NULL DEFAULT '0',
  `vod` int(1) NOT NULL DEFAULT '1',
  `captions` varchar(255) NOT NULL,
  `marked` int(1) NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media`
--

INSERT INTO `media` (`id`, `tmdb`, `media_order`, `name`, `fname`, `duration`, `duration_custom`, `s_time`, `e_time`, `size`, `type`, `url`, `title`, `description`, `stored`, `encoded`, `onair`, `vod`, `captions`, `marked`, `deleted`) VALUES
(22, 0, 2, '-kojima_productions_logo_moviemp4.mp4', 'Заставка Kojima Productions', 37, 0, 1539326223, 1539326260, 5101545, NULL, NULL, NULL, NULL, 1, 1, 0, 1, '', 0, 0),
(28, 0, 21, '-mobile_intro_720pmp4.mp4', 'Демосцена (тизер)', 36, 0, 1539347658, 1539347694, 5987379, NULL, NULL, NULL, NULL, 0, 1, 0, 1, '', 1, 0),
(32, 0, 14, '-peppa_chatterboxmp4.mp4', 'Свинка Пеппа: Болтушка (с русскими и английскими субтитрами)', 300, 0, 1547564101, 1547564401, 13281487, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(36, 0, 20, '-venom__russkiy_treyler_4k_subtitry_2018_720pmp4.mp4', 'Трейлер \"Веном\" с русскими субтитрами', 157, 0, 1547567627, 1547567784, 22634739, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 1, 0),
(37, 0, 15, '-eye_of_the_storm_4k_ultra_hdmp4.mp4', 'Глаз шторма (документальная съемка)', 340, 0, 1529397160, 1529397500, 79841904, NULL, NULL, NULL, NULL, 0, 1, 0, 1, '', 0, 0),
(46, 0, 18, '-dedpul_2__russkiy_treyler_keybla_subtitry_4k_2018mp4.mp4', 'Трейлер \"Дедпул-2\" (с субтитрами)', 146, 0, 1547565311, 1547565457, 18550335, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 1, 0),
(49, 0, 19, '-candidcameramp4.mp4', 'Скрытая камера в Москве', 1514, 0, 1547565457, 1547566971, 127483925, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 1, 0),
(50, 0, 19, '-silencemp4mp4.mp4', 'Молчание (фильм с субтитрами)', 656, 0, 1547566971, 1547567627, 143726572, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(55, 0, 15, '-6_puteshestvie_muravjamp4.mp4', 'Путешествие муравья (мультфильм)', 547, 0, 1540507807, 1540508354, 133529940, NULL, NULL, NULL, NULL, 0, 1, 0, 1, '', 1, 0),
(60, 0, 2, '-death_stranding__russkiy_treyler_igry_3_subtitry_4k_2017_720pmp4.mp4', 'Трейлер игры \"Death Stranding\"', 512, 0, 1547559344, 1547559856, 66168883, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 1, 0),
(71, 0, 10, '-tirkmen10mp4.mp4', '10 ИНТЕРЕСНЫХ ФАКТОВ ПРО ТУРКМЕНИСТАН', 471, 0, 1540506077, 1540506548, 204670692, NULL, NULL, NULL, NULL, 0, 1, 0, 1, '', 0, 0),
(78, 0, 15, '-otkrovenno_govorya_robert_fominmp4.mp4', 'Откровенно говоря (Роберт Фомин)', 1038, 256, 1547564401, 1547564657, 111472609, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(79, 0, 8, '-three_cats_1_1_1mp4.mp4', 'Три кота - \"Музыкальная открытка\" ', 279, 0, 1547561594, 1547561873, 56327336, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(80, 0, 12, '-three_cats_1_2_1mp4.mp4', 'Три кота - \"Киношедевр\" ', 287, 0, 1547563063, 1547563350, 57972975, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(81, 0, 16, '-three_cats_1_3_1mp4.mp4', 'Три кота - \"Пикник\"', 285, 0, 1547564657, 1547564942, 57699346, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(83, 0, 9, '-otkrovenno_govorya_mihail_veselovmp4.mp4', 'Откровенно говоря (Михаил Веселов)', 534, 534, 1547561873, 1547562407, 88978460, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(84, 0, 13, '-otkrovenno_govorya_anton_zeleninmp4.mp4', 'Откровенно говоря (Антон Зеленин)', 751, 751, 1547563350, 1547564101, 106963427, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(85, 0, 11, '-otkrovenno_govorya_viktor_palennyymp4.mp4', 'Откровенно говоря (Виктор Паленный)', 656, 656, 1547562407, 1547563063, 93593042, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(86, 0, 17, '-jizn_govoryashchih_ruk_aleksey_savelevich_belovmp4.mp4', 'Жизнь говорящих рук (Алексей Белов)', 369, 369, 1547564942, 1547565311, 60574101, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(151, 0, 4, '-italyancy_smotryat_eralash__46_40_chertey_i_odna_zelenaya_muhamp4.mp4', '1000 чертей и одна муха.mp4 ', 395, 0, 1547560772, 1547561167, 37401233, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(153, 0, 6, '-how_oldschool_graphics_worked_part_1_-_commodore_and_nintendomov.mp4', 'Как работала графика на Nintendo и Commodore', 427, 0, 1547561167, 1547561594, 173829366, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(154, 0, 3, '-avtobus_liaz-677__istoriya_sozdaniya_i_test-drayv___sovetskiy_avtoprom___zenkevich_pro_avtomobilimov.mp4', 'История создания и тест-драйв автобуса ЛИАЗ-677', 916, 0, 1547559856, 1547560772, 388657554, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(160, 0, 0, '-finalmp4.mp4', 'Заставка', 30, 0, 1547551862, 1547551892, 31529547, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(161, 374416, 0, '-k-chertu-na-rogamp4.mp4', 'К чёрту на рога', 5032, 0, 1547551892, 1547556924, 462807621, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(162, 0, 0, '-stenotypemp4.mp4', 'Стенотайп', 152, 0, 1547556924, 1547557076, 13161450, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(163, 0, 0, '-graham_norton_show.mp4', '-graham_norton_show.mp4', 1344, 0, 1547557076, 1547558420, 155661605, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(164, 0, 0, '-russkie_subtitry_kevin_hart_seriously_funny_-_dedushkamp4.mp4', '-russkie_subtitry_kevin_hart_seriously_funny_-_dedushkamp4.mp4', 232, 0, 1547558420, 1547558652, 11772541, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(165, 0, 0, '-kevin_hart_-_kak_ya_v_pervyy_raz_zamaterilsya___kevin_hart_-_first_time_cursing_russkie_subtitrymp4.mp4', '-kevin_hart_-_kak_ya_v_pervyy_raz_zamaterilsya___kevin_hart_-_first_time_cursing_russkie_subtitrymp4.mp4', 291, 0, 1547558652, 1547558943, 13478401, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(166, 0, 0, '-kris_rok_-_sovety_jenshchinammp4.mp4', '-kris_rok_-_sovety_jenshchinammp4.mp4', 401, 0, 1547558943, 1547559344, 24548216, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(167, 0, 0, '-jiber2019_01_21_15_37_27_372mp4.mp4', 'Про комиссара Жибера', 487, 0, 0, 0, 75851046, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(168, 0, 0, '-schwarz2019_01_21_15_59_25_036mp4.mp4', 'Про Коммандо', 759, 0, 0, 0, 69346378, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0),
(169, 0, 0, '-filmy_s_tomom_hardi_kotorye_luchshe_venoma___chto_tom_hardi_delaet_v_venome2019_01_21_16_10_48_790mp.mp4', 'Фильмы с Томом Харди, которые лучше Венома', 353, 0, 0, 0, 46554018, NULL, NULL, NULL, NULL, 0, 1, 1, 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `media_files`
--

CREATE TABLE `media_files` (
  `id` int(10) NOT NULL,
  `type` varchar(5) CHARACTER SET latin1 NOT NULL,
  `unique_id` varchar(100) NOT NULL,
  `media_id` int(10) NOT NULL,
  `storage_id` int(10) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `size` int(20) NOT NULL,
  `created_on` date NOT NULL,
  `modified_on` date NOT NULL,
  `bitrate` varchar(10) CHARACTER SET latin1 NOT NULL,
  `width` varchar(10) CHARACTER SET latin1 NOT NULL,
  `height` varchar(10) CHARACTER SET latin1 NOT NULL,
  `author_email` varchar(20) CHARACTER SET latin1 NOT NULL,
  `container` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media_files`
--

INSERT INTO `media_files` (`id`, `type`, `unique_id`, `media_id`, `storage_id`, `display_name`, `size`, `created_on`, `modified_on`, `bitrate`, `width`, `height`, `author_email`, `container`) VALUES
(16, 'video', 'birdavi', 16, 1, 'birdavi', 1496576, '2018-04-19', '2018-04-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(17, 'video', 'ashvsevildeads03e01goblinavi', 17, 1, 'ashvsevildeads03e01goblinavi', 367130624, '2018-04-20', '2018-04-20', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(18, 'video', 'i_outmp4', 18, 1, 'i_outmp4', 381205, '2018-04-20', '2018-04-20', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(19, 'video', '6_puteshestvie_muravjamp4', 19, 1, '6_puteshestvie_muravjamp4', 133529940, '2018-04-20', '2018-04-20', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(20, 'video', 'the_titan_-_official_trailer_-_2018_sci-fi_movie_hdmp4', 20, 1, 'the_titan_-_official_trailer_-_2018_sci-fi_movie_hdmp4', 14851135, '2018-04-20', '2018-04-20', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(21, 'video', 'fc40mp4', 21, 1, 'fc40mp4', 92037499, '2018-04-21', '2018-04-21', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(22, 'video', 'kojima_productions_logo_moviemp4', 22, 1, 'kojima_productions_logo_moviemp4', 5101545, '2018-04-23', '2018-04-23', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(23, 'video', 'city_vlog_version_1_-_length__52_seconds_720pmp4', 23, 1, 'city_vlog_version_1_-_length__52_seconds_720pmp4', 21681559, '2018-04-23', '2018-04-23', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(24, 'video', 'cbw3avi', 24, 1, 'cbw3avi', 837120, '2018-04-24', '2018-04-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(25, 'video', 'dropavi', 25, 1, 'dropavi', 675840, '2018-04-24', '2018-04-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(26, 'video', 'mobile_intro_720pmp4', 26, 1, 'mobile_intro_720pmp4', 5987379, '2018-04-24', '2018-04-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(27, 'video', 'smallmp4', 27, 1, 'smallmp4', 383631, '2018-04-24', '2018-04-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(28, 'video', 'mobile_intro_720pmp4', 28, 1, 'mobile_intro_720pmp4', 5987379, '2018-04-24', '2018-04-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(32, 'video', 'peppa_chatterboxmp4', 32, 1, 'peppa_chatterboxmp4', 13281487, '2018-04-25', '2018-04-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(36, 'video', 'venom__russkiy_treyler_4k_subtitry_2018_720pmp4', 36, 1, 'venom__russkiy_treyler_4k_subtitry_2018_720pmp4', 22634739, '2018-05-06', '2018-05-06', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(37, 'video', 'eye_of_the_storm_4k_ultra_hdmp4', 37, 1, 'eye_of_the_storm_4k_ultra_hdmp4', 79841904, '2018-05-10', '2018-05-10', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(38, 'video', 'monika_levinski_na_ted_-_cena_styda_russkie_subtitrymp4', 38, 1, 'monika_levinski_na_ted_-_cena_styda_russkie_subtitrymp4', 196278855, '2018-05-10', '2018-05-10', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(39, 'video', 'kelli_makgonigal_kak_prevratit_stress_v_druga_ted_talkmp4', 39, 1, 'kelli_makgonigal_kak_prevratit_stress_v_druga_ted_talkmp4', 122780436, '2018-05-10', '2018-05-10', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(40, 'video', 'siliconvalleys01e01minimumviableproduct-1mp4', 40, 1, 'siliconvalleys01e01minimumviableproduct-1mp4', 436178364, '2018-05-10', '2018-05-10', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(41, 'video', 'ashvsevildeads03e01goblinavi', 41, 1, 'ashvsevildeads03e01goblinavi', 367130624, '2018-05-14', '2018-05-14', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(42, 'video', '01belaya_noch_dxp_ruavi', 42, 1, '01belaya_noch_dxp_ruavi', 316823488, '2018-05-14', '2018-05-14', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(43, 'video', '02belaya_noch_dxp_ruavi', 43, 1, '02belaya_noch_dxp_ruavi', 244802614, '2018-05-17', '2018-05-17', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(44, 'video', '03belaya_noch_dxp_ruavi', 44, 1, '03belaya_noch_dxp_ruavi', 259896784, '2018-05-17', '2018-05-17', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(45, 'video', '04belaya_noch_dxp_ruavi', 45, 1, '04belaya_noch_dxp_ruavi', 298555856, '2018-05-17', '2018-05-17', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(46, 'video', 'dedpul_2__russkiy_treyler_keybla_subtitry_4k_2018mp4', 46, 1, 'dedpul_2__russkiy_treyler_keybla_subtitry_4k_2018mp4', 18550335, '2018-05-20', '2018-05-20', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(47, 'video', 'odesskaya_gruppa_feniks_v_tmjmp4', 47, 1, 'odesskaya_gruppa_feniks_v_tmjmp4', 518303192, '2018-05-22', '2018-05-22', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(49, 'video', 'candidcameramp4', 49, 1, 'candidcameramp4', 127483925, '2018-05-22', '2018-05-22', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(50, 'video', 'silencemp4mp4', 50, 1, 'silencemp4mp4', 143726572, '2018-05-22', '2018-05-22', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(51, 'video', 'vvmp4', 51, 1, 'vvmp4', 609667850, '2018-05-22', '2018-05-22', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(52, 'video', 'c1gmp4', 52, 1, 'c1gmp4', 610744215, '2018-05-22', '2018-05-22', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(53, 'video', 'tr1bemp4', 53, 1, 'tr1bemp4', 588175477, '2018-05-22', '2018-05-22', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(54, 'video', 'tg_polarmp4', 54, 1, 'tg_polarmp4', 591596062, '2018-05-22', '2018-05-22', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(55, 'video', '6_puteshestvie_muravjamp4', 55, 1, '6_puteshestvie_muravjamp4', 133529940, '2018-05-22', '2018-05-22', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(56, 'video', 'flameavi', 56, 1, 'flameavi', 289280, '2018-05-23', '2018-05-23', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(57, 'video', 'dropavi', 57, 1, 'dropavi', 675840, '2018-05-23', '2018-05-23', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(58, 'video', 'cbw3avi', 58, 1, 'cbw3avi', 837120, '2018-05-24', '2018-05-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(59, 'video', 'novosti_gluhihnet_za_may_2018_g_720pmp4', 59, 1, 'novosti_gluhihnet_za_may_2018_g_720pmp4', 138577772, '2018-05-31', '2018-05-31', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(60, 'video', 'death_stranding__russkiy_treyler_igry_3_subtitry_4k_2017_720pmp4', 60, 1, 'death_stranding__russkiy_treyler_igry_3_subtitry_4k_2017_720pmp4', 66168883, '2018-06-19', '2018-06-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(69, 'video', 'russkiy_paren_porazil_vseh_kitaycev_gordey_kolesov1mp4', 69, 1, 'russkiy_paren_porazil_vseh_kitaycev_gordey_kolesov1mp4', 35482136, '2018-09-19', '2018-09-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(70, 'video', 'i_outmp4', 70, 1, 'i_outmp4', 381205, '2018-10-24', '2018-10-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(71, 'video', 'tirkmen10mp4', 71, 1, 'tirkmen10mp4', 204670692, '2018-10-24', '2018-10-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(73, 'video', 'sumasshedshee_yaponskoe_shou_-_stena_korobok_russkie_subtitry_rjaka_-_otorvakamp4', 73, 1, 'sumasshedshee_yaponskoe_shou_-_stena_korobok_russkie_subtitry_rjaka_-_otorvakamp4', 44787436, '2018-10-24', '2018-10-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(74, 'video', 'o_cygane_i_devyati_voronah_polskiy_russkie_subtitrymp4', 74, 1, 'o_cygane_i_devyati_voronah_polskiy_russkie_subtitrymp4', 44440415, '2018-10-24', '2018-10-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(75, 'video', 'shrek_thriller_russkie_subtitrymp4', 75, 1, 'shrek_thriller_russkie_subtitrymp4', 50889152, '2018-10-24', '2018-10-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(76, 'video', 'luchshaya_yaponskaya_reklama_-_smeh_do_slez__chto_za_dich_u_nih_v_golove_tvoritsyamp4', 76, 1, 'luchshaya_yaponskaya_reklama_-_smeh_do_slez__chto_za_dich_u_nih_v_golove_tvoritsyamp4', 99582788, '2018-10-24', '2018-10-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(77, 'video', 'chetvertyy_festival_kvn_v_minskemp4', 77, 1, 'chetvertyy_festival_kvn_v_minskemp4', 593618459, '2018-10-24', '2018-10-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(78, 'video', 'otkrovenno_govorya_robert_fominmp4', 78, 1, 'otkrovenno_govorya_robert_fominmp4', 111472609, '2018-10-24', '2018-10-24', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(79, 'video', 'three_cats_1_1_1mp4', 79, 1, 'three_cats_1_1_1mp4', 56327336, '2018-10-25', '2018-10-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(80, 'video', 'three_cats_1_2_1mp4', 80, 1, 'three_cats_1_2_1mp4', 57972975, '2018-10-25', '2018-10-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(81, 'video', 'three_cats_1_3_1mp4', 81, 1, 'three_cats_1_3_1mp4', 57699346, '2018-10-25', '2018-10-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(82, 'video', 'eraser_1999bdripxvid146gbac3mp4', 82, 1, 'eraser_1999bdripxvid146gbac3mp4', 1148149884, '2018-10-25', '2018-10-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(83, 'video', 'otkrovenno_govorya_mihail_veselovmp4', 83, 1, 'otkrovenno_govorya_mihail_veselovmp4', 88978460, '2018-10-25', '2018-10-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(84, 'video', 'otkrovenno_govorya_anton_zeleninmp4', 84, 1, 'otkrovenno_govorya_anton_zeleninmp4', 106963427, '2018-10-25', '2018-10-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(85, 'video', 'otkrovenno_govorya_viktor_palennyymp4', 85, 1, 'otkrovenno_govorya_viktor_palennyymp4', 93593042, '2018-10-25', '2018-10-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(86, 'video', 'jizn_govoryashchih_ruk_aleksey_savelevich_belovmp4', 86, 1, 'jizn_govoryashchih_ruk_aleksey_savelevich_belovmp4', 60574101, '2018-10-25', '2018-10-25', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(87, 'video', 'hotsummernights2017hdripx264ac3-ovelhaetmoviesmp4', 87, 1, 'hotsummernights2017hdripx264ac3-ovelhaetmoviesmp4', 1110570107, '2018-10-26', '2018-10-26', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(88, 'video', 'prizrak1990_torrentsrump4', 88, 1, 'prizrak1990_torrentsrump4', 1393840149, '2018-10-27', '2018-10-27', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(89, 'video', 'long1mp4', 89, 1, 'long1mp4', 357647537, '2018-10-31', '2018-10-31', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(90, 'video', 'heavytrip2018avi', 90, 1, 'heavytrip2018avi', 1246310904, '2018-11-06', '2018-11-06', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(91, 'video', 'jungle2017bdrip146gbdubmegapeeravi', 91, 1, 'jungle2017bdrip146gbdubmegapeeravi', 1497147208, '2018-11-07', '2018-11-07', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(92, 'video', '22mlmp4', 92, 1, '22mlmp4', 411487514, '2018-11-08', '2018-11-08', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(93, 'video', 'neprozsonnyimp4', 93, 1, 'neprozsonnyimp4', 303349089, '2018-11-08', '2018-11-08', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(94, 'video', 'machinemp4', 94, 1, 'machinemp4', 217372578, '2018-11-08', '2018-11-08', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(95, 'video', 'poker_housemp4', 95, 1, 'poker_housemp4', 323620552, '2018-11-08', '2018-11-08', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(96, 'video', 'danger_buisnessmp4', 96, 1, 'danger_buisnessmp4', 423307902, '2018-11-08', '2018-11-08', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(97, 'video', 'prazdnichnyy_perepolohmp4', 97, 1, 'prazdnichnyy_perepolohmp4', 464122331, '2018-11-08', '2018-11-08', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(99, 'video', 'trikota4mp4', 99, 1, 'trikota4mp4', 39728211, '2018-11-14', '2018-11-14', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(100, 'video', '3kota4mp4', 100, 1, '3kota4mp4', 39728211, '2018-11-16', '2018-11-16', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(101, 'video', 'cbw3avi', 101, 1, 'cbw3avi', 837120, '2018-11-16', '2018-11-16', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(102, 'video', 'birdavi', 102, 1, 'birdavi', 1496576, '2018-11-16', '2018-11-16', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(103, 'video', 'object_htmlinputelement', 103, 1, 'object_htmlinputelement', 185278, '2018-11-16', '2018-11-16', '5000', '720', '560', 'dxpsite@gmail.com', 'video/x-ms-wmv'),
(104, 'video', 'object_htmlinputelement', 104, 1, 'object_htmlinputelement', 289280, '2018-11-16', '2018-11-16', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(105, 'video', 'object_htmlinputelement', 105, 1, 'object_htmlinputelement', 86836, '2018-11-16', '2018-11-16', '5000', '720', '560', 'dxpsite@gmail.com', 'video/x-ms-wmv'),
(106, 'video', 'video2wmv', 106, 1, 'video2wmv', 86836, '2018-11-16', '2018-11-16', '5000', '720', '560', 'dxpsite@gmail.com', 'video/x-ms-wmv'),
(107, 'video', 'stepmov', 107, 1, 'stepmov', 843897, '2018-11-16', '2018-11-16', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(108, 'video', 'dropavi', 108, 1, 'dropavi', 675840, '2018-11-17', '2018-11-17', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(109, 'video', 'samplempg', 109, 1, 'samplempg', 671744, '2018-11-17', '2018-11-17', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mpeg'),
(110, 'video', 'samplemov', 110, 1, 'samplemov', 469690, '2018-11-17', '2018-11-17', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(111, 'video', 'dropavi', 111, 1, 'dropavi', 675840, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(112, 'video', 'cbw3avi', 112, 1, 'cbw3avi', 837120, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(113, 'video', 'birdavi', 113, 1, 'birdavi', 1496576, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(114, 'video', 'flameavi', 114, 1, 'flameavi', 289280, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(115, 'video', 'samplemov', 115, 1, 'samplemov', 469690, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(116, 'video', 'cbw3avi', 116, 1, 'cbw3avi', 837120, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(117, 'video', 'samplempg', 117, 1, 'samplempg', 671744, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mpeg'),
(118, 'video', 'samplemov', 118, 1, 'samplemov', 469690, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(119, 'video', 'dropavi', 119, 1, 'dropavi', 675840, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(120, 'video', 'cbw3avi', 120, 1, 'cbw3avi', 837120, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(121, 'video', 'sampleavi', 121, 1, 'sampleavi', 375688, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(122, 'video', 'birdavi', 122, 1, 'birdavi', 1496576, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(123, 'video', 'cbw3avi', 123, 1, 'cbw3avi', 837120, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(124, 'video', 'samplempg', 124, 1, 'samplempg', 671744, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mpeg'),
(125, 'video', 'samplemov', 125, 1, 'samplemov', 469690, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(126, 'video', 'birdavi', 126, 1, 'birdavi', 1496576, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(127, 'video', 'cbw3avi', 127, 1, 'cbw3avi', 837120, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(128, 'video', 'samplemov', 128, 1, 'samplemov', 469690, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(129, 'video', 'birdavi', 129, 1, 'birdavi', 1496576, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(130, 'video', 'dropavi', 130, 1, 'dropavi', 675840, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(131, 'video', 'samplemov', 131, 1, 'samplemov', 469690, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(132, 'video', 'samplemov', 132, 1, 'samplemov', 469690, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(133, 'video', 'cbw3avi', 133, 1, 'cbw3avi', 837120, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(134, 'video', 'cbw3avi', 134, 1, 'cbw3avi', 837120, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(135, 'video', 'samplempg', 135, 1, 'samplempg', 671744, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mpeg'),
(136, 'video', 'flameavi', 136, 1, 'flameavi', 289280, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(137, 'video', 'samplemov', 137, 1, 'samplemov', 469690, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(138, 'video', 'birdavi', 138, 1, 'birdavi', 1496576, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(139, 'video', 'cbw3avi', 139, 1, 'cbw3avi', 837120, '2018-11-18', '2018-11-18', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(140, 'video', 'stepteen2mov', 140, 1, 'stepteen2mov', 396831, '2018-11-19', '2018-11-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(141, 'video', 'video1wmv', 141, 1, 'video1wmv', 185278, '2018-11-19', '2018-11-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/x-ms-wmv'),
(142, 'video', 'video2wmv', 142, 1, 'video2wmv', 86836, '2018-11-19', '2018-11-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/x-ms-wmv'),
(143, 'video', 'dropavi', 143, 1, 'dropavi', 675840, '2018-11-19', '2018-11-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(144, 'video', 'video2wmv', 144, 1, 'video2wmv', 86836, '2018-11-19', '2018-11-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/x-ms-wmv'),
(145, 'video', 'video2wmv', 145, 1, 'video2wmv', 86836, '2018-11-19', '2018-11-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/x-ms-wmv'),
(146, 'video', 'korotkometrajnyy_film_ataka_mertvecov_osovecmp4', 146, 1, 'korotkometrajnyy_film_ataka_mertvecov_osovecmp4', 165695231, '2018-11-19', '2018-11-19', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(147, 'video', 'samplempg', 147, 1, 'samplempg', 671744, '2018-11-26', '2018-11-26', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mpeg'),
(148, 'video', 'sampleavi', 148, 1, 'sampleavi', 375688, '2018-11-26', '2018-11-26', '5000', '720', '560', 'dxpsite@gmail.com', 'video/avi'),
(149, 'video', 'spymp4', 149, 1, 'spymp4', 515871185, '2018-11-26', '2018-11-26', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(151, 'video', 'italyancy_smotryat_eralash__46_40_chertey_i_odna_zelenaya_muhamp4', 151, 1, 'italyancy_smotryat_eralash__46_40_chertey_i_odna_zelenaya_muhamp4', 37401233, '2018-11-28', '2018-11-28', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(152, 'video', 'italyancy_smotryat_epichnye_video_iz_rossiimp4', 152, 1, 'italyancy_smotryat_epichnye_video_iz_rossiimp4', 49760396, '2018-11-28', '2018-11-28', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(153, 'video', 'how_oldschool_graphics_worked_part_1_-_commodore_and_nintendomov', 153, 1, 'how_oldschool_graphics_worked_part_1_-_commodore_and_nintendomov', 173829366, '2018-11-28', '2018-11-28', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(154, 'video', 'avtobus_liaz-677__istoriya_sozdaniya_i_test-drayv___sovetskiy_avtoprom___zenkevich_pro_avtomobilimov', 154, 1, 'avtobus_liaz-677__istoriya_sozdaniya_i_test-drayv___sovetskiy_avtoprom___zenkevich_pro_avtomobilimov', 388657554, '2018-11-30', '2018-11-30', '5000', '720', '560', 'dxpsite@gmail.com', 'video/quicktime'),
(160, 'video', 'finalmp4', 160, 1, 'finalmp4', 31529547, '2019-01-11', '2019-01-11', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(161, 'video', 'k-chertu-na-rogamp4', 161, 1, 'k-chertu-na-rogamp4', 462807621, '2019-01-14', '2019-01-14', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(162, 'video', 'stenotypemp4', 162, 1, 'stenotypemp4', 13161450, '2019-01-15', '2019-01-15', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(163, 'video', 'graham_norton_show', 163, 1, 'graham_norton_show', 155661605, '2019-01-15', '2019-01-15', '5000', '720', '560', 'dxpsite@gmail.com', 'application/octet-st'),
(164, 'video', 'russkie_subtitry_kevin_hart_seriously_funny_-_dedushkamp4', 164, 1, 'russkie_subtitry_kevin_hart_seriously_funny_-_dedushkamp4', 11772541, '2019-01-15', '2019-01-15', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(165, 'video', 'kevin_hart_-_kak_ya_v_pervyy_raz_zamaterilsya___kevin_hart_-_first_time_cursing_russkie_subtitrymp4', 165, 1, 'kevin_hart_-_kak_ya_v_pervyy_raz_zamaterilsya___kevin_hart_-_first_time_cursing_russkie_subtitrymp4', 13478401, '2019-01-15', '2019-01-15', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(166, 'video', 'kris_rok_-_sovety_jenshchinammp4', 166, 1, 'kris_rok_-_sovety_jenshchinammp4', 24548216, '2019-01-15', '2019-01-15', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(167, 'video', 'jiber2019_01_21_15_37_27_372mp4', 167, 1, 'jiber2019_01_21_15_37_27_372mp4', 75851046, '2019-01-21', '2019-01-21', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(168, 'video', 'schwarz2019_01_21_15_59_25_036mp4', 168, 1, 'schwarz2019_01_21_15_59_25_036mp4', 69346378, '2019-01-21', '2019-01-21', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4'),
(169, 'video', 'filmy_s_tomom_hardi_kotorye_luchshe_venoma___chto_tom_hardi_delaet_v_venome2019_01_21_16_10_48_790mp', 169, 1, 'filmy_s_tomom_hardi_kotorye_luchshe_venoma___chto_tom_hardi_delaet_v_venome2019_01_21_16_10_48_790mp4', 46554018, '2019-01-21', '2019-01-21', '5000', '720', '560', 'dxpsite@gmail.com', 'video/mp4');

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `page_title` text NOT NULL,
  `page_url` text NOT NULL,
  `page_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`page_id`, `page_title`, `page_url`, `page_order`) VALUES
(1, 'JSON - Dynamic Dependent Dropdown List using Jquery and Ajax', 'json-dynamic-dependent-dropdown-list-using-jquery-and-ajax', 3),
(2, 'Live Table Data Edit Delete using Tabledit Plugin in PHP', 'live-table-data-edit-delete-using-tabledit-plugin-in-php', 5),
(3, 'Create Treeview with Bootstrap Treeview Ajax JQuery in PHP\r\n', 'create-treeview-with-bootstrap-treeview-ajax-jquery-in-php', 9),
(4, 'Bootstrap Multiselect Dropdown with Checkboxes using Jquery in PHP\r\n', 'bootstrap-multiselect-dropdown-with-checkboxes-using-jquery-in-php', 0),
(5, 'Facebook Style Popup Notification using PHP Ajax Bootstrap\r\n', 'facebook-style-popup-notification-using-php-ajax-bootstrap', 1),
(6, 'Modal with Dynamic Previous & Next Data Button by Ajax PHP\r\n', 'modal-with-dynamic-previous-next-data-button-by-ajax-php', 6),
(7, 'How to Use Bootstrap Select Plugin with Ajax Jquery PHP\r\n', 'how-to-use-bootstrap-select-plugin-with-ajax-jquery-php', 7),
(8, 'How to Load CSV File data into HTML Table Using AJAX jQuery\r\n', 'how-to-load-csv-file-data-into-html-table-using-ajax-jquery', 8),
(9, 'Autocomplete Textbox using Typeahead with Ajax PHP Bootstrap\r\n', 'autocomplete-textbox-using-typeahead-with-ajax-php-bootstrap', 4),
(10, 'Export Data to Excel in Codeigniter using PHPExcel\r\n', 'export-data-to-excel-in-codeigniter-using-phpexcel', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `pevents`
--

CREATE TABLE `pevents` (
  `eventid` int(11) NOT NULL,
  `idmedia` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `event_order` int(11) NOT NULL,
  `idpls` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `e_time` int(11) NOT NULL,
  `s_time` int(11) NOT NULL,
  `marked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pevents`
--

INSERT INTO `pevents` (`eventid`, `idmedia`, `name`, `event_order`, `idpls`, `title`, `color`, `start`, `end`, `e_time`, `s_time`, `marked`) VALUES
(160, 87, 'Жаркие летние ночи (фильм с субтитрами)', 3, 8, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(161, 86, 'Жизнь говорящих рук (Алексей Белов)', 1, 8, '', NULL, '0000-00-00 00:00:00', NULL, 1547707209, 1547706840, 0),
(170, 96, 'Опасный бизнес (фильм с субтитрами)', 2, 8, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(171, 97, 'Праздничный переполох (фильм с субтитрами)', 2, 10, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(172, 96, 'Опасный бизнес (фильм с субтитрами)', 0, 10, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(173, 95, 'Дом покера (фильм с субтитрами)', 4, 10, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(174, 94, 'Машина (фильм с субтитрами)', 5, 10, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(175, 93, 'Непрощённый (фильм с субтитрами).mp4 ', 6, 10, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(176, 92, '22 мили (фильм с субтитрами)', 3, 10, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(178, 91, 'Джунгли (фильм с субтитрами)', 1, 10, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(179, 96, 'Опасный бизнес (фильм с субтитрами)', 1, 12, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(180, 95, 'Дом покера (фильм с субтитрами)', 0, 12, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(181, 98, 'Идеальные незнакомцы (фильм с субтитрами)', 1, 14, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(182, 96, 'Опасный бизнес (фильм с субтитрами)', 2, 14, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(183, 94, 'Машина (фильм с субтитрами)', 3, 14, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(184, 93, 'Непрощённый (фильм с субтитрами).mp4 ', 4, 14, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(185, 88, 'Призрак (фильм с субтитрами)', 5, 14, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(186, 86, 'Жизнь говорящих рук (Алексей Белов)', 6, 14, '', NULL, '0000-00-00 00:00:00', NULL, 1547707209, 1547706840, 0),
(187, 76, 'Лучшая японская реклама', 0, 14, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(188, 81, 'Три кота - \"Пикник\"', 7, 14, '', NULL, '0000-00-00 00:00:00', NULL, 1547580493, 1547580208, 0),
(192, 99, '-trikota4mp4.mp4', 5, 15, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(193, 98, 'Идеальные незнакомцы (фильм с субтитрами)', 1, 15, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(194, 67, 'Трейлер \"Правда или действие\"', 2, 15, '', NULL, '0000-00-00 00:00:00', NULL, 1547211365, 1547211195, 1),
(195, 64, 'Трейлер \"Жаркие летние ночи\"', 3, 15, '', NULL, '0000-00-00 00:00:00', NULL, 1547509883, 1547509730, 0),
(196, 49, 'Скрытая камера в Москве', 4, 15, '', NULL, '0000-00-00 00:00:00', NULL, 1547509700, 1547508186, 1),
(197, 36, 'Трейлер \"Веном\" с русскими субтитрами', 0, 15, '', NULL, '0000-00-00 00:00:00', NULL, 1547210109, 1547209952, 0),
(198, 146, 'Атака мертвецов: Осовец ', 0, 16, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(200, 150, '', 1, 17, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(201, 146, 'Атака мертвецов: Осовец ', 0, 17, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(202, 154, '-avtobus_liaz-677__istoriya_sozdaniya_i_test-drayv___sovetskiy_avtoprom___zenkevich_pro_avtomobilimov.mp4', 0, 8, '', NULL, '0000-00-00 00:00:00', NULL, 1548080399, 1548079483, 0),
(205, 154, '-avtobus_liaz-677__istoriya_sozdaniya_i_test-drayv___sovetskiy_avtoprom___zenkevich_pro_avtomobilimov.mp4', 1, 19, '', NULL, '0000-00-00 00:00:00', NULL, 1548080399, 1548079483, 0),
(206, 146, 'Атака мертвецов: Осовец ', 0, 19, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(207, 145, '-video2wmv.mp4', 0, 20, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(208, 143, '-dropavi.mp4', 1, 20, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(223, 154, '-avtobus_liaz-677__istoriya_sozdaniya_i_test-drayv___sovetskiy_avtoprom___zenkevich_pro_avtomobilimov.mp4', 0, 21, '', NULL, '0000-00-00 00:00:00', NULL, 1548080399, 1548079483, 0),
(224, 151, '1000 чертей и одна муха.mp4 ', 1, 21, '', NULL, '0000-00-00 00:00:00', NULL, 1547211790, 1547211395, 0),
(225, 144, '-video2wmv.mp4', 0, 22, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(226, 141, 'Killer Hunter', 2, 22, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(227, 137, '-samplemov.mp4', 1, 22, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(228, 141, 'Killer Hunter', 0, 23, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(229, 135, '-samplempg.mp4', 1, 23, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(230, 112, '-cbw3avi.mp4', 2, 23, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(231, 153, 'Как работала графика на Nintendo и Commodore', 1, 25, '', NULL, '0000-00-00 00:00:00', NULL, 1547241831, 1547241404, 0),
(232, 146, 'Атака мертвецов: Осовец ', 0, 25, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(233, 153, 'Как работала графика на Nintendo и Commodore', 3, 25, '', NULL, '0000-00-00 00:00:00', NULL, 1547241831, 1547241404, 0),
(234, 153, 'Как работала графика на Nintendo и Commodore', 5, 25, '', NULL, '0000-00-00 00:00:00', NULL, 1547241831, 1547241404, 0),
(235, 157, '-the_mountainmp4.mp4', 2, 25, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(236, 155, '-birdavi.mp4', 4, 25, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(237, 154, 'История создания и тест-драйв автобуса ЛИАЗ-677', 1, 26, '', NULL, '0000-00-00 00:00:00', NULL, 1548080399, 1548079483, 0),
(238, 158, '-poker_housemp4.mp4', 2, 26, '', NULL, '0000-00-00 00:00:00', NULL, 1547247832, 1547242577, 0),
(239, 157, '-the_mountainmp4.mp4', 0, 26, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(240, 151, '1000 чертей и одна муха.mp4 ', 0, 27, '', NULL, '0000-00-00 00:00:00', NULL, 1547211790, 1547211395, 0),
(241, 81, 'Три кота - \"Пикник\"', 1, 27, '', NULL, '0000-00-00 00:00:00', NULL, 1547580493, 1547580208, 0),
(242, 80, 'Три кота - \"Киношедевр\" ', 2, 27, '', NULL, '0000-00-00 00:00:00', NULL, 1547579661, 1547579374, 0),
(243, 79, 'Три кота - \"Музыкальная открытка\" ', 3, 27, '', NULL, '0000-00-00 00:00:00', NULL, 1547581072, 1547580793, 0),
(244, 55, 'Путешествие муравья (мультфильм)', 4, 27, '', NULL, '0000-00-00 00:00:00', NULL, 1547580208, 1547579661, 0),
(245, 98, 'Идеальные незнакомцы (фильм с субтитрами)', 5, 27, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(246, 157, 'Бамблби ', 4, 28, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(247, 156, 'Сирота казанская', 1, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547212299, 1547207410, 0),
(248, 81, 'Три кота - \"Пикник\"', 3, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547580493, 1547580208, 0),
(249, 80, 'Три кота - \"Киношедевр\" ', 5, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547579661, 1547579374, 0),
(250, 79, 'Три кота - \"Музыкальная открытка\" ', 0, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547581072, 1547580793, 0),
(257, 80, 'Три кота - \"Киношедевр\" ', 1, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1547579661, 1547579374, 0),
(259, 81, 'Три кота - \"Пикник\"', 3, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1547580493, 1547580208, 0),
(260, 79, 'Три кота - \"Музыкальная открытка\" ', 5, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1547581072, 1547580793, 0),
(279, 46, 'Трейлер \"Дедпул-2\" (с субтитрами)', 1, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1547210285, 1547210139, 0),
(284, 151, '1000 чертей и одна муха.mp4 ', 6, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547211790, 1547211395, 0),
(285, 22, 'Заставка Kojima Productions', 7, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547447739, 1547447702, 0),
(286, 31, 'Полёт с птицами на дельтаплане (документальная съемка)', 8, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547073573, 1547073311, 0),
(287, 35, '-the_mountainmp4.mp4', 9, 28, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(288, 55, 'Путешествие муравья (мультфильм)', 10, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547580208, 1547579661, 0),
(289, 72, 'Джим Кэрри', 11, 28, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(290, 86, 'Жизнь говорящих рук (Алексей Белов)', 2, 28, '', NULL, '0000-00-00 00:00:00', NULL, 1547707209, 1547706840, 0),
(291, 86, 'Жизнь говорящих рук (Алексей Белов)', 4, 31, '', NULL, '0000-00-00 00:00:00', NULL, 1547707209, 1547706840, 0),
(292, 83, 'Откровенно говоря (Михаил Веселов)', 3, 31, '', NULL, '0000-00-00 00:00:00', NULL, 1547706840, 1547706306, 0),
(293, 78, 'Откровенно говоря (Роберт Фомин)', 1, 31, '', NULL, '0000-00-00 00:00:00', NULL, 1547705555, 1547705299, 1),
(294, 84, 'Откровенно говоря (Антон Зеленин)', 2, 31, '', NULL, '0000-00-00 00:00:00', NULL, 1547706306, 1547705555, 0),
(295, 85, 'Откровенно говоря (Виктор Паленный)', 5, 31, '', NULL, '0000-00-00 00:00:00', NULL, 1547707865, 1547707209, 1),
(296, 55, 'Путешествие муравья (мультфильм)', 2, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1547580208, 1547579661, 0),
(297, 32, 'Свинка Пеппа: Болтушка (с русскими и английскими субтитрами)', 4, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1547580793, 1547580493, 0),
(300, 36, 'Трейлер \"Веном\" с русскими субтитрами', 5, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1547210109, 1547209952, 0),
(302, 36, 'Трейлер \"Веном\" с русскими субтитрами', 1, 32, '', NULL, '0000-00-00 00:00:00', NULL, 1547210109, 1547209952, 0),
(303, 46, 'Трейлер \"Дедпул-2\" (с субтитрами)', 2, 32, '', NULL, '0000-00-00 00:00:00', NULL, 1547210285, 1547210139, 0),
(305, 60, 'Трейлер игры \"Death Stranding\"', 3, 32, '', NULL, '0000-00-00 00:00:00', NULL, 1547210827, 1547210315, 0),
(321, 153, 'Как работала графика на Nintendo и Commodore', 1, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1547241831, 1547241404, 0),
(323, 86, 'Жизнь говорящих рук (Алексей Белов)', 3, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1547707209, 1547706840, 0),
(325, 80, 'Три кота - \"Киношедевр\" ', 5, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1547579661, 1547579374, 0),
(327, 158, 'Джонни Инглиш 3.0 ', 7, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1547247832, 1547242577, 0),
(329, 71, '10 ИНТЕРЕСНЫХ ФАКТОВ ПРО ТУРКМЕНИСТАН', 9, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1547505999, 1547505528, 1),
(332, 151, '1000 чертей и одна муха.mp4 ', 4, 32, '', NULL, '0000-00-00 00:00:00', NULL, 1547211790, 1547211395, 0),
(334, 49, 'Скрытая камера в Москве', 5, 32, '', NULL, '0000-00-00 00:00:00', NULL, 1547509700, 1547508186, 1),
(347, 160, 'Заставка', 2, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(348, 160, 'Заставка', 0, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(349, 160, 'Заставка', 4, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(350, 160, 'Заставка', 6, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(351, 160, 'Заставка', 8, 33, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(352, 160, 'Заставка', 0, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(353, 151, '1000 чертей и одна муха.mp4 ', 1, 34, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(354, 160, 'Заставка', 2, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(355, 81, 'Три кота - \"Пикник\"', 3, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1547580493, 1547580208, 0),
(356, 160, 'Заставка', 4, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(357, 64, 'Трейлер \"Жаркие летние ночи\"', 5, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1547509883, 1547509730, 0),
(358, 160, 'Заставка', 9, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(359, 55, 'Путешествие муравья (мультфильм)', 6, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1547580208, 1547579661, 0),
(360, 86, 'Жизнь говорящих рук (Алексей Белов)', 7, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1547707209, 1547706840, 0),
(361, 79, 'Три кота - \"Музыкальная открытка\" ', 8, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1547581072, 1547580793, 0),
(362, 71, '10 ИНТЕРЕСНЫХ ФАКТОВ ПРО ТУРКМЕНИСТАН', 10, 34, '', NULL, '0000-00-00 00:00:00', NULL, 1547505999, 1547505528, 0),
(364, 160, 'Заставка', 0, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(368, 161, 'hotelroyale', 1, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547503529, 1547495031, 1),
(370, 160, 'Заставка', 2, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(371, 160, 'Заставка', 4, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(373, 160, 'Заставка', 6, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(374, 154, 'История создания и тест-драйв автобуса ЛИАЗ-677', 5, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548080399, 1548079483, 0),
(375, 86, 'Жизнь говорящих рук (Алексей Белов)', 7, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547707209, 1547706840, 0),
(376, 160, 'Заставка', 8, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(377, 81, 'Три кота - \"Пикник\"', 9, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547580493, 1547580208, 0),
(378, 160, 'Заставка', 10, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(379, 71, '10 ИНТЕРЕСНЫХ ФАКТОВ ПРО ТУРКМЕНИСТАН', 11, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547505999, 1547505528, 0),
(380, 160, 'Заставка', 12, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(381, 55, 'Путешествие муравья (мультфильм)', 13, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547580208, 1547579661, 0),
(382, 160, 'Заставка', 14, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(383, 50, 'Молчание (фильм с субтитрами)', 15, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547507262, 1547506606, 0),
(384, 160, 'Заставка', 16, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(385, 79, 'Три кота - \"Музыкальная открытка\" ', 3, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547581072, 1547580793, 0),
(386, 83, 'Откровенно говоря (Михаил Веселов)', 17, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547706840, 1547706306, 0),
(387, 160, 'Заставка', 18, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(388, 32, 'Свинка Пеппа: Болтушка (с русскими и английскими субтитрами)', 19, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547580793, 1547580493, 0),
(389, 160, 'Заставка', 20, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(390, 49, 'Скрытая камера в Москве', 21, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547509700, 1547508186, 0),
(391, 160, 'Заставка', 22, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(392, 64, 'Трейлер \"Жаркие летние ночи\"', 23, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547509883, 1547509730, 0),
(393, 160, 'Заставка', 24, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(394, 78, 'Откровенно говоря (Роберт Фомин)', 25, 36, '', NULL, '0000-00-00 00:00:00', NULL, 1547705555, 1547705299, 1),
(395, 160, 'Заставка', 0, 37, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(399, 166, '-kris_rok_-_sovety_jenshchinammp4.mp4', 3, 30, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(400, 165, '-kevin_hart_-_kak_ya_v_pervyy_raz_zamaterilsya___kevin_hart_-_first_time_cursing_russkie_subtitrymp4.mp4', 7, 30, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(401, 164, '-russkie_subtitry_kevin_hart_seriously_funny_-_dedushkamp4.mp4', 9, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1548080661, 1548080429, 1),
(402, 163, '-graham_norton_show.mp4', 11, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1547582446, 1547581102, 0),
(403, 162, 'Стенотайп', 12, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1548080843, 1548080691, 0),
(404, 163, '-graham_norton_show.mp4', 7, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1547582446, 1547581102, 0),
(405, 160, 'Заставка', 6, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(406, 160, 'Заставка', 0, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(407, 160, 'Заставка', 8, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(408, 164, '-russkie_subtitry_kevin_hart_seriously_funny_-_dedushkamp4.mp4', 9, 29, '', NULL, '0000-00-00 00:00:00', NULL, 1548080661, 1548080429, 1),
(409, 160, 'Заставка', 0, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(410, 160, 'Заставка', 2, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(411, 160, 'Заставка', 4, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(412, 160, 'Заставка', 6, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(413, 160, 'Заставка', 10, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(414, 160, 'Заставка', 8, 30, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(415, 160, 'Заставка', 0, 31, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(416, 160, 'Заставка', 0, 32, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(417, 160, 'Заставка', 0, 35, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(418, 163, '-graham_norton_show.mp4', 1, 35, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(419, 160, 'Заставка', 2, 35, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(420, 162, 'Стенотайп', 3, 35, '', NULL, '0000-00-00 00:00:00', NULL, 1548080843, 1548080691, 0),
(421, 160, 'Заставка', 4, 35, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(422, 164, '-russkie_subtitry_kevin_hart_seriously_funny_-_dedushkamp4.mp4', 5, 35, '', NULL, '0000-00-00 00:00:00', NULL, 1548080661, 1548080429, 0),
(423, 160, 'Заставка', 6, 35, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(424, 151, '1000 чертей и одна муха.mp4 ', 7, 35, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(425, 160, 'Заставка', 8, 35, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(426, 46, 'Трейлер \"Дедпул-2\" (с субтитрами)', 9, 35, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(428, 164, '-russkie_subtitry_kevin_hart_seriously_funny_-_dedushkamp4.mp4', 5, 37, '', NULL, '0000-00-00 00:00:00', NULL, 1548080661, 1548080429, 0),
(431, 160, 'Заставка', 6, 32, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(432, 165, '-kevin_hart_-_kak_ya_v_pervyy_raz_zamaterilsya___kevin_hart_-_first_time_cursing_russkie_subtitrymp4.mp4', 7, 32, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(433, 160, 'Заставка', 8, 32, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(434, 161, 'К чёрту на рога', 9, 32, '', NULL, '0000-00-00 00:00:00', NULL, 0, 0, 0),
(435, 167, 'Про комиссара Жибера', 9, 37, '', NULL, '0000-00-00 00:00:00', NULL, 1548081360, 1548080873, 0),
(436, 160, 'Заставка', 8, 37, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(437, 160, 'Заставка', 10, 37, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(438, 168, 'Про Коммандо', 11, 37, '', NULL, '0000-00-00 00:00:00', NULL, 1548082149, 1548081390, 0),
(439, 160, 'Заставка', 12, 37, '', NULL, '0000-00-00 00:00:00', NULL, 1548082179, 1548082149, 0),
(440, 169, 'Фильмы с Томом Харди, которые лучше Венома', 13, 37, '', NULL, '0000-00-00 00:00:00', NULL, 1548082532, 1548082179, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `idevent` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `playlists`
--

INSERT INTO `playlists` (`id`, `idevent`, `title`, `color`, `start`, `end`) VALUES
(1, 0, 'test_one', '#008000', '2018-11-02 00:00:00', '2018-11-02 18:00:00'),
(2, 0, 'второй лист', '#0071c5', '2018-11-03 12:00:00', '2018-11-04 00:00:00'),
(3, 0, 'трейлеры', '#FF8C00', '2018-11-04 00:00:00', '2018-11-08 00:00:00'),
(4, 0, 'мульты', '#40E0D0', '2018-11-11 06:00:00', '2018-11-11 10:00:00'),
(5, 0, 'проверочный', '#008000', '2018-11-06 00:00:00', '2018-11-09 00:00:00'),
(6, 0, 'прогонный', '#FF8C00', '2018-11-07 00:00:00', '2018-11-11 00:00:00'),
(7, 0, 'фильмы', '#0071c5', '2018-11-11 10:00:00', '2018-11-11 18:00:00'),
(8, 0, 'запуск промо', '#FF8C00', '2018-11-12 10:00:00', '2018-11-13 00:00:00'),
(9, 0, 'промо1', '#0071c5', '2018-11-13 00:00:00', '2018-11-14 00:00:00'),
(11, 0, 'movies', '', '2018-11-14 00:00:00', '2018-11-15 00:00:00'),
(12, 0, 'пятничное', '', '2018-11-09 00:00:00', '2018-11-10 00:00:00'),
(13, 0, 'прогонка', '#FFD700', '2018-11-15 00:00:00', '2018-11-16 00:00:00'),
(14, 0, 'прогонная 2', '#008000', '2018-11-12 00:00:00', '2018-11-13 00:00:00'),
(15, 0, 'пятничное', '', '2018-11-16 00:00:00', '2018-11-17 00:00:00'),
(16, 0, 'специальное', '#008000', '2018-11-16 00:00:00', '2018-11-17 00:00:00'),
(17, 0, 'преролл', '', '2018-11-25 00:00:00', '2018-11-26 00:00:00'),
(18, 0, 'reward', '#0071c5', '2018-11-10 00:00:00', '2018-11-11 00:00:00'),
(19, 0, 'выпуск 1', '#008000', '2018-12-03 00:00:00', '2018-12-04 00:00:00'),
(20, 0, 'выпуск 2', '#FFD700', '2018-12-04 00:00:00', '2018-12-05 00:00:00'),
(21, 0, 'тройка', '#FFD700', '2018-12-05 00:00:00', '2018-12-06 00:00:00'),
(22, 0, 'прогон тизеров', '#FF0000', '2018-12-04 00:00:00', '2018-12-05 00:00:00'),
(23, 0, 'трейлеры фильмов', '#0071c5', '2018-12-05 00:00:00', '2018-12-06 00:00:00'),
(24, 0, 'тесты', '#FF8C00', '2018-12-05 00:00:00', '2018-12-06 00:00:00'),
(25, 0, 'тест1', '', '2018-11-28 00:00:00', '2018-11-29 00:00:00'),
(26, 0, 'предновогоднее', '#008000', '2018-12-20 00:00:00', '2018-12-21 00:00:00'),
(27, 0, 'праздничное', '', '2018-12-28 00:00:00', '2018-12-29 00:00:00'),
(28, 0, 'Рождество', '', '2019-01-06 00:00:00', '2019-01-12 00:00:00'),
(29, 0, 'мульты', '#008000', '2019-01-15 00:00:00', '2019-01-16 00:00:00'),
(30, 0, 'среда', '#FF0000', '2019-01-16 00:00:00', '2019-01-17 00:00:00'),
(31, 0, 'четверг', '#FF8C00', '2019-01-17 00:00:00', '2019-01-18 00:00:00'),
(32, 0, 'пятничное', '#008000', '2019-01-18 00:00:00', '2019-01-19 00:00:00'),
(33, 0, 'субботнее', '#FF8C00', '2019-01-12 00:00:00', '2019-01-13 00:00:00'),
(34, 0, 'длинная неделя ', '', '2019-01-13 00:00:00', '2019-01-14 00:00:00'),
(35, 0, 'субботнее 19', '#40E0D0', '2019-01-19 00:00:00', '2019-01-21 00:00:00'),
(36, 0, 'пятидневка - один плейлист на рабочую неделю', '', '2019-01-14 00:00:00', '2019-01-19 00:00:00'),
(37, 0, 'промо', '#008000', '2019-01-21 00:00:00', '2019-02-11 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `var` varchar(250) NOT NULL,
  `val` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `var`, `val`) VALUES
(1, 'Flussonic URL', 'https://peerhub.ru'),
(2, 'Flussonic Login', 'flussonic'),
(3, 'Flussonic Password', 'letmein!'),
(4, 'Playlist Stream Path (local)', 'private_local'),
(5, 'S3 Endpoint URL', 'hb.bizmrg.com'),
(6, 'VOD liles (1 loc)', 'privat'),
(7, 'VOD liles (2 loc)', 'locale1');

-- --------------------------------------------------------

--
-- Структура таблицы `vod_media`
--

CREATE TABLE `vod_media` (
  `id` int(11) NOT NULL,
  `tmdbid` int(10) NOT NULL,
  `medialink` varchar(255) NOT NULL,
  `poster` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vod_media`
--

INSERT INTO `vod_media` (`id`, `tmdbid`, `medialink`, `poster`) VALUES
(13, 477489, 'https://hb.bizmrg.com/dxponebucket/dont_breath_indark.mp4', 1),
(14, 272548, 'https://www.stormo.tv/get_file/23/f3d733631592bde73f50bd9368139c1039e55e6ae4/345000/345565/345565_low.mp4', 1),
(15, 400155, 'https://www.stormo.tv/get_file/11/e933b70ee016c51381eb2594da1d46d5bdf03b771c/345000/345326/345326_low.mp4', 1),
(16, 353081, 'https://hb.bizmrg.com/dxponebucket/mi5.mp4', 1),
(17, 345940, 'https://hb.bizmrg.com/dxponebucket/meg.mp4', 1),
(18, 433627, 'https://hb.bizmrg.com/dxponebucket/7%20Days%20in%20Entebbe.mp4', 1),
(19, 489931, 'https://hb.bizmrg.com/dxponebucket/117724_360p.mp4', 1),
(20, 414001, 'https://hb.bizmrg.com/dxponebucket/337732.mp4', 1),
(21, 434355, 'https://hb.bizmrg.com/dxponebucket/343138_low.mp4', 1),
(22, 346910, 'https://hb.bizmrg.com/dxponebucket/predator_cut.mp4', 1),
(23, 395841, 'https://hb.bizmrg.com/dxponebucket/hold_the_dark.mp4', 1),
(24, 348350, 'https://hb.bizmrg.com/dxponebucket/han_solo.mp4', 1),
(25, 459928, 'https://hb.bizmrg.com/dxponebucket/12feet.mp4', 1),
(26, 400535, 'https://hb.bizmrg.com/dxponebucket/sicario2.mp4', 1),
(27, 502259, 'https://hb.bizmrg.com/dxponebucket/grump.mp4', 1),
(29, 493551, 'https://hb.bizmrg.com/dxponebucket/operation_finale.mp4', 1),
(30, 438590, 'https://hb.bizmrg.com/dxponebucket/axl.mp4', 1),
(31, 376570, 'https://www.stormo.tv/get_file/26/a46f1da5f8a38347322a4f6613f653bc418dcc093c/350000/350745/350745_low.mp4', 1),
(32, 467824, 'https://hb.bizmrg.com/dxponebucket/inran.mp4', 1),
(33, 429300, 'https://hb.bizmrg.com/dxponebucket/vovlastistihii.mp4', 1),
(34, 443463, 'https://hb.bizmrg.com/dxponebucket/leavenotrace.mp4', 1),
(35, 493922, 'https://hb.bizmrg.com/dxponebucket/reincarnation.mp4', 1),
(36, 513427, 'https://hb.bizmrg.com/dxponebucket/kinglear.mp4', 1),
(37, 274870, 'https://hb.bizmrg.com/dxponebucket/passengers.mp4', 1),
(38, 50357, 'https://hb.bizmrg.com/dxponebucket/apollo18.mp4', 1),
(39, 10122, 'https://hb.bizmrg.com/dxponebucket/flightnav.mp4', 1),
(40, 804, 'https://hb.bizmrg.com/dxponebucket/rome_vacancy.mp4', 1),
(41, 73281, 'https://hb.bizmrg.com/dxponebucket/des.mp4', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pevents`
--
ALTER TABLE `pevents`
  ADD PRIMARY KEY (`eventid`);

--
-- Индексы таблицы `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vod_media`
--
ALTER TABLE `vod_media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--


--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT для таблицы `media_test`
--
ALTER TABLE `media_test`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `pevents`
--
ALTER TABLE `pevents`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT для таблицы `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `vod_media`
--
ALTER TABLE `vod_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

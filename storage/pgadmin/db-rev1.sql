PGDMP     $    /                z            spfh    14.3 (Debian 14.3-1.pgdg110+1)    14.3 �    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    16385    spfh    DATABASE     X   CREATE DATABASE spfh WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'en_US.utf8';
    DROP DATABASE spfh;
                postgres    false            �            1259    16536    category    TABLE     c   CREATE TABLE public.category (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.category;
       public         heap    postgres    false            �            1259    16535    category_id_seq    SEQUENCE     x   CREATE SEQUENCE public.category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.category_id_seq;
       public          postgres    false    237            �           0    0    category_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.category_id_seq OWNED BY public.category.id;
          public          postgres    false    236            �            1259    16513    event    TABLE     G  CREATE TABLE public.event (
    id bigint NOT NULL,
    event_status_id bigint NOT NULL,
    link character varying NOT NULL,
    title character varying(255) NOT NULL,
    description character varying(510) NOT NULL,
    schedule_at timestamp without time zone NOT NULL,
    expired_at timestamp without time zone NOT NULL
);
    DROP TABLE public.event;
       public         heap    postgres    false            �            1259    16512    event_id_seq    SEQUENCE     u   CREATE SEQUENCE public.event_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.event_id_seq;
       public          postgres    false    231            �           0    0    event_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.event_id_seq OWNED BY public.event.id;
          public          postgres    false    230            �            1259    16522    event_status    TABLE     g   CREATE TABLE public.event_status (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
     DROP TABLE public.event_status;
       public         heap    postgres    false            �            1259    16521    event_status_id_seq    SEQUENCE     |   CREATE SEQUENCE public.event_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.event_status_id_seq;
       public          postgres    false    233            �           0    0    event_status_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.event_status_id_seq OWNED BY public.event_status.id;
          public          postgres    false    232            �            1259    16543    feedback    TABLE     �   CREATE TABLE public.feedback (
    id bigint NOT NULL,
    feedback_status_id bigint NOT NULL,
    user_id bigint NOT NULL,
    title character varying(255) NOT NULL,
    datetime timestamp without time zone NOT NULL,
    description text NOT NULL
);
    DROP TABLE public.feedback;
       public         heap    postgres    false            �            1259    16542    feedback_id_seq    SEQUENCE     x   CREATE SEQUENCE public.feedback_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.feedback_id_seq;
       public          postgres    false    239            �           0    0    feedback_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.feedback_id_seq OWNED BY public.feedback.id;
          public          postgres    false    238            �            1259    16550    feedback_status    TABLE     j   CREATE TABLE public.feedback_status (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
 #   DROP TABLE public.feedback_status;
       public         heap    postgres    false            �            1259    16549    feedback_status_id_seq    SEQUENCE        CREATE SEQUENCE public.feedback_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.feedback_status_id_seq;
       public          postgres    false    241            �           0    0    feedback_status_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.feedback_status_id_seq OWNED BY public.feedback_status.id;
          public          postgres    false    240            �            1259    16429    form    TABLE       CREATE TABLE public.form (
    id bigint NOT NULL,
    form_status_id bigint NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    reported_at timestamp without time zone NOT NULL,
    group_id bigint NOT NULL,
    location_id bigint NOT NULL,
    place character varying(255) NOT NULL,
    situation character varying(510) NOT NULL,
    possibility character varying(510) NOT NULL,
    repairaction character varying(510) NOT NULL,
    repairsuggest character varying(510) NOT NULL
);
    DROP TABLE public.form;
       public         heap    postgres    false            �            1259    16428    form_id_seq    SEQUENCE     t   CREATE SEQUENCE public.form_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.form_id_seq;
       public          postgres    false    221            �           0    0    form_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.form_id_seq OWNED BY public.form.id;
          public          postgres    false    220            �            1259    16556    form_process    TABLE     �   CREATE TABLE public.form_process (
    form_id bigint NOT NULL,
    form_status_id bigint NOT NULL,
    datetime timestamp without time zone NOT NULL,
    description character varying(510) NOT NULL
);
     DROP TABLE public.form_process;
       public         heap    postgres    false            �            1259    16449    form_status    TABLE     f   CREATE TABLE public.form_status (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.form_status;
       public         heap    postgres    false            �            1259    16448    form_status_id_seq    SEQUENCE     {   CREATE SEQUENCE public.form_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.form_status_id_seq;
       public          postgres    false    223            �           0    0    form_status_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.form_status_id_seq OWNED BY public.form_status.id;
          public          postgres    false    222            �            1259    16567    form_tag    TABLE     g   CREATE TABLE public.form_tag (
    form_id bigint NOT NULL,
    tag character varying(255) NOT NULL
);
    DROP TABLE public.form_tag;
       public         heap    postgres    false            �            1259    16566    form_tags_form_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.form_tags_form_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.form_tags_form_id_seq;
       public          postgres    false    244            �           0    0    form_tags_form_id_seq    SEQUENCE OWNED BY     N   ALTER SEQUENCE public.form_tags_form_id_seq OWNED BY public.form_tag.form_id;
          public          postgres    false    243            �            1259    16456    group    TABLE     b   CREATE TABLE public."group" (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public."group";
       public         heap    postgres    false            �            1259    16455    group_id_seq    SEQUENCE     u   CREATE SEQUENCE public.group_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.group_id_seq;
       public          postgres    false    225            �           0    0    group_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.group_id_seq OWNED BY public."group".id;
          public          postgres    false    224            �            1259    16473    location    TABLE     c   CREATE TABLE public.location (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.location;
       public         heap    postgres    false            �            1259    16472    location_id_seq    SEQUENCE     x   CREATE SEQUENCE public.location_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.location_id_seq;
       public          postgres    false    227            �           0    0    location_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.location_id_seq OWNED BY public.location.id;
          public          postgres    false    226            �            1259    16491    news    TABLE     l  CREATE TABLE public.news (
    id bigint NOT NULL,
    news_status_id bigint NOT NULL,
    category_id bigint NOT NULL,
    title character varying(255) NOT NULL,
    image character varying NOT NULL,
    description character varying(510) NOT NULL,
    content text NOT NULL,
    created_at timestamp without time zone NOT NULL,
    created_by bigint NOT NULL
);
    DROP TABLE public.news;
       public         heap    postgres    false            �            1259    16490    news_id_seq    SEQUENCE     t   CREATE SEQUENCE public.news_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.news_id_seq;
       public          postgres    false    229            �           0    0    news_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.news_id_seq OWNED BY public.news.id;
          public          postgres    false    228            �            1259    16529    news_status    TABLE     f   CREATE TABLE public.news_status (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.news_status;
       public         heap    postgres    false            �            1259    16528    news_status_id_seq    SEQUENCE     {   CREATE SEQUENCE public.news_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.news_status_id_seq;
       public          postgres    false    235            �           0    0    news_status_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.news_status_id_seq OWNED BY public.news_status.id;
          public          postgres    false    234            �            1259    16406    token    TABLE     �  CREATE TABLE public.token (
    user_id bigint NOT NULL,
    token_type_id bigint NOT NULL,
    oid character varying(28) NOT NULL,
    "unique" character varying(64) NOT NULL,
    token_status_id bigint NOT NULL,
    version bigint NOT NULL,
    created_at timestamp without time zone NOT NULL,
    expired_at timestamp without time zone NOT NULL,
    revoked_at timestamp without time zone,
    refreshed_at timestamp without time zone
);
    DROP TABLE public.token;
       public         heap    postgres    false            �            1259    16402    token_status    TABLE     g   CREATE TABLE public.token_status (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
     DROP TABLE public.token_status;
       public         heap    postgres    false            �            1259    16401    token_status_id_seq    SEQUENCE     |   CREATE SEQUENCE public.token_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.token_status_id_seq;
       public          postgres    false    216            �           0    0    token_status_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.token_status_id_seq OWNED BY public.token_status.id;
          public          postgres    false    215            �            1259    16397 
   token_type    TABLE     e   CREATE TABLE public.token_type (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.token_type;
       public         heap    postgres    false            �            1259    16396    token_type_id_seq    SEQUENCE     z   CREATE SEQUENCE public.token_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.token_type_id_seq;
       public          postgres    false    214            �           0    0    token_type_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.token_type_id_seq OWNED BY public.token_type.id;
          public          postgres    false    213            �            1259    16412    user    TABLE     6  CREATE TABLE public."user" (
    id bigint NOT NULL,
    user_type_id bigint NOT NULL,
    user_status_id bigint NOT NULL,
    nip character varying(32) NOT NULL,
    password character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    address character varying(510),
    group_id bigint
);
    DROP TABLE public."user";
       public         heap    postgres    false            �            1259    16411    user_id_seq    SEQUENCE     t   CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.user_id_seq;
       public          postgres    false    219            �           0    0    user_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.user_id_seq OWNED BY public."user".id;
          public          postgres    false    218            �            1259    16392    user_status    TABLE     f   CREATE TABLE public.user_status (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.user_status;
       public         heap    postgres    false            �            1259    16391    user_status_id_seq    SEQUENCE     {   CREATE SEQUENCE public.user_status_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.user_status_id_seq;
       public          postgres    false    212            �           0    0    user_status_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.user_status_id_seq OWNED BY public.user_status.id;
          public          postgres    false    211            �            1259    16387 	   user_type    TABLE     d   CREATE TABLE public.user_type (
    id bigint NOT NULL,
    name character varying(255) NOT NULL
);
    DROP TABLE public.user_type;
       public         heap    postgres    false            �            1259    16386    user_type_id_seq    SEQUENCE     y   CREATE SEQUENCE public.user_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.user_type_id_seq;
       public          postgres    false    210            �           0    0    user_type_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.user_type_id_seq OWNED BY public.user_type.id;
          public          postgres    false    209            �           2604    16539    category id    DEFAULT     j   ALTER TABLE ONLY public.category ALTER COLUMN id SET DEFAULT nextval('public.category_id_seq'::regclass);
 :   ALTER TABLE public.category ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    236    237    237            �           2604    16516    event id    DEFAULT     d   ALTER TABLE ONLY public.event ALTER COLUMN id SET DEFAULT nextval('public.event_id_seq'::regclass);
 7   ALTER TABLE public.event ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    230    231    231            �           2604    16525    event_status id    DEFAULT     r   ALTER TABLE ONLY public.event_status ALTER COLUMN id SET DEFAULT nextval('public.event_status_id_seq'::regclass);
 >   ALTER TABLE public.event_status ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    232    233    233            �           2604    16546    feedback id    DEFAULT     j   ALTER TABLE ONLY public.feedback ALTER COLUMN id SET DEFAULT nextval('public.feedback_id_seq'::regclass);
 :   ALTER TABLE public.feedback ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    239    238    239            �           2604    16553    feedback_status id    DEFAULT     x   ALTER TABLE ONLY public.feedback_status ALTER COLUMN id SET DEFAULT nextval('public.feedback_status_id_seq'::regclass);
 A   ALTER TABLE public.feedback_status ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    241    240    241            �           2604    16432    form id    DEFAULT     b   ALTER TABLE ONLY public.form ALTER COLUMN id SET DEFAULT nextval('public.form_id_seq'::regclass);
 6   ALTER TABLE public.form ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            �           2604    16452    form_status id    DEFAULT     p   ALTER TABLE ONLY public.form_status ALTER COLUMN id SET DEFAULT nextval('public.form_status_id_seq'::regclass);
 =   ALTER TABLE public.form_status ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223            �           2604    16570    form_tag form_id    DEFAULT     u   ALTER TABLE ONLY public.form_tag ALTER COLUMN form_id SET DEFAULT nextval('public.form_tags_form_id_seq'::regclass);
 ?   ALTER TABLE public.form_tag ALTER COLUMN form_id DROP DEFAULT;
       public          postgres    false    243    244    244            �           2604    16459    group id    DEFAULT     f   ALTER TABLE ONLY public."group" ALTER COLUMN id SET DEFAULT nextval('public.group_id_seq'::regclass);
 9   ALTER TABLE public."group" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    225    225            �           2604    16476    location id    DEFAULT     j   ALTER TABLE ONLY public.location ALTER COLUMN id SET DEFAULT nextval('public.location_id_seq'::regclass);
 :   ALTER TABLE public.location ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    227    227            �           2604    16494    news id    DEFAULT     b   ALTER TABLE ONLY public.news ALTER COLUMN id SET DEFAULT nextval('public.news_id_seq'::regclass);
 6   ALTER TABLE public.news ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    229    229            �           2604    16532    news_status id    DEFAULT     p   ALTER TABLE ONLY public.news_status ALTER COLUMN id SET DEFAULT nextval('public.news_status_id_seq'::regclass);
 =   ALTER TABLE public.news_status ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    235    235            �           2604    16405    token_status id    DEFAULT     r   ALTER TABLE ONLY public.token_status ALTER COLUMN id SET DEFAULT nextval('public.token_status_id_seq'::regclass);
 >   ALTER TABLE public.token_status ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215    216            �           2604    16400    token_type id    DEFAULT     n   ALTER TABLE ONLY public.token_type ALTER COLUMN id SET DEFAULT nextval('public.token_type_id_seq'::regclass);
 <   ALTER TABLE public.token_type ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    213    214            �           2604    16415    user id    DEFAULT     d   ALTER TABLE ONLY public."user" ALTER COLUMN id SET DEFAULT nextval('public.user_id_seq'::regclass);
 8   ALTER TABLE public."user" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    219    219            �           2604    16395    user_status id    DEFAULT     p   ALTER TABLE ONLY public.user_status ALTER COLUMN id SET DEFAULT nextval('public.user_status_id_seq'::regclass);
 =   ALTER TABLE public.user_status ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    212    212            �           2604    16390    user_type id    DEFAULT     l   ALTER TABLE ONLY public.user_type ALTER COLUMN id SET DEFAULT nextval('public.user_type_id_seq'::regclass);
 ;   ALTER TABLE public.user_type ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    209    210    210            �          0    16536    category 
   TABLE DATA           ,   COPY public.category (id, name) FROM stdin;
    public          postgres    false    237   ߊ       �          0    16513    event 
   TABLE DATA           g   COPY public.event (id, event_status_id, link, title, description, schedule_at, expired_at) FROM stdin;
    public          postgres    false    231   �       �          0    16522    event_status 
   TABLE DATA           0   COPY public.event_status (id, name) FROM stdin;
    public          postgres    false    233   <�       �          0    16543    feedback 
   TABLE DATA           a   COPY public.feedback (id, feedback_status_id, user_id, title, datetime, description) FROM stdin;
    public          postgres    false    239   k�       �          0    16550    feedback_status 
   TABLE DATA           3   COPY public.feedback_status (id, name) FROM stdin;
    public          postgres    false    241   ��       �          0    16429    form 
   TABLE DATA           �   COPY public.form (id, form_status_id, user_id, created_at, reported_at, group_id, location_id, place, situation, possibility, repairaction, repairsuggest) FROM stdin;
    public          postgres    false    221   ��       �          0    16556    form_process 
   TABLE DATA           V   COPY public.form_process (form_id, form_status_id, datetime, description) FROM stdin;
    public          postgres    false    242   (�       �          0    16449    form_status 
   TABLE DATA           /   COPY public.form_status (id, name) FROM stdin;
    public          postgres    false    223   E�       �          0    16567    form_tag 
   TABLE DATA           0   COPY public.form_tag (form_id, tag) FROM stdin;
    public          postgres    false    244   ��       �          0    16456    group 
   TABLE DATA           +   COPY public."group" (id, name) FROM stdin;
    public          postgres    false    225   ̌       �          0    16473    location 
   TABLE DATA           ,   COPY public.location (id, name) FROM stdin;
    public          postgres    false    227   �       �          0    16491    news 
   TABLE DATA           {   COPY public.news (id, news_status_id, category_id, title, image, description, content, created_at, created_by) FROM stdin;
    public          postgres    false    229   e�       �          0    16529    news_status 
   TABLE DATA           /   COPY public.news_status (id, name) FROM stdin;
    public          postgres    false    235   ��       �          0    16406    token 
   TABLE DATA           �   COPY public.token (user_id, token_type_id, oid, "unique", token_status_id, version, created_at, expired_at, revoked_at, refreshed_at) FROM stdin;
    public          postgres    false    217   ��       �          0    16402    token_status 
   TABLE DATA           0   COPY public.token_status (id, name) FROM stdin;
    public          postgres    false    216   �       ~          0    16397 
   token_type 
   TABLE DATA           .   COPY public.token_type (id, name) FROM stdin;
    public          postgres    false    214   *�       �          0    16412    user 
   TABLE DATA           j   COPY public."user" (id, user_type_id, user_status_id, nip, password, name, address, group_id) FROM stdin;
    public          postgres    false    219   Y�       |          0    16392    user_status 
   TABLE DATA           /   COPY public.user_status (id, name) FROM stdin;
    public          postgres    false    212   �       z          0    16387 	   user_type 
   TABLE DATA           -   COPY public.user_type (id, name) FROM stdin;
    public          postgres    false    210   �       �           0    0    category_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.category_id_seq', 3, true);
          public          postgres    false    236            �           0    0    event_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.event_id_seq', 12, true);
          public          postgres    false    230            �           0    0    event_status_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.event_status_id_seq', 2, true);
          public          postgres    false    232            �           0    0    feedback_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.feedback_id_seq', 14, true);
          public          postgres    false    238            �           0    0    feedback_status_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.feedback_status_id_seq', 1, false);
          public          postgres    false    240            �           0    0    form_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.form_id_seq', 45, true);
          public          postgres    false    220            �           0    0    form_status_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.form_status_id_seq', 5, true);
          public          postgres    false    222            �           0    0    form_tags_form_id_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.form_tags_form_id_seq', 1, false);
          public          postgres    false    243            �           0    0    group_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.group_id_seq', 6, true);
          public          postgres    false    224            �           0    0    location_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.location_id_seq', 13, true);
          public          postgres    false    226            �           0    0    news_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.news_id_seq', 23, true);
          public          postgres    false    228            �           0    0    news_status_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.news_status_id_seq', 2, true);
          public          postgres    false    234            �           0    0    token_status_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.token_status_id_seq', 1, false);
          public          postgres    false    215            �           0    0    token_type_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.token_type_id_seq', 1, false);
          public          postgres    false    213            �           0    0    user_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.user_id_seq', 18, true);
          public          postgres    false    218            �           0    0    user_status_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.user_status_id_seq', 1, false);
          public          postgres    false    211            �           0    0    user_type_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.user_type_id_seq', 1, false);
          public          postgres    false    209            �           2606    16541    category category_pk 
   CONSTRAINT     R   ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pk PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.category DROP CONSTRAINT category_pk;
       public            postgres    false    237            �           2606    16518    event event_pk 
   CONSTRAINT     L   ALTER TABLE ONLY public.event
    ADD CONSTRAINT event_pk PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.event DROP CONSTRAINT event_pk;
       public            postgres    false    231            �           2606    24759    feedback feedback_pk 
   CONSTRAINT     R   ALTER TABLE ONLY public.feedback
    ADD CONSTRAINT feedback_pk PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.feedback DROP CONSTRAINT feedback_pk;
       public            postgres    false    239            �           2606    16555 "   feedback_status feedback_status_pk 
   CONSTRAINT     `   ALTER TABLE ONLY public.feedback_status
    ADD CONSTRAINT feedback_status_pk PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.feedback_status DROP CONSTRAINT feedback_status_pk;
       public            postgres    false    241            �           2606    16489    form form_pk 
   CONSTRAINT     J   ALTER TABLE ONLY public.form
    ADD CONSTRAINT form_pk PRIMARY KEY (id);
 6   ALTER TABLE ONLY public.form DROP CONSTRAINT form_pk;
       public            postgres    false    221            �           2606    16562    form_process form_process_pk 
   CONSTRAINT     o   ALTER TABLE ONLY public.form_process
    ADD CONSTRAINT form_process_pk PRIMARY KEY (form_id, form_status_id);
 F   ALTER TABLE ONLY public.form_process DROP CONSTRAINT form_process_pk;
       public            postgres    false    242    242            �           2606    16454    form_status form_status_pk 
   CONSTRAINT     X   ALTER TABLE ONLY public.form_status
    ADD CONSTRAINT form_status_pk PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.form_status DROP CONSTRAINT form_status_pk;
       public            postgres    false    223            �           2606    16527    event_status form_status_pk_1 
   CONSTRAINT     [   ALTER TABLE ONLY public.event_status
    ADD CONSTRAINT form_status_pk_1 PRIMARY KEY (id);
 G   ALTER TABLE ONLY public.event_status DROP CONSTRAINT form_status_pk_1;
       public            postgres    false    233            �           2606    24765    form_tag form_tag_pk 
   CONSTRAINT     \   ALTER TABLE ONLY public.form_tag
    ADD CONSTRAINT form_tag_pk PRIMARY KEY (form_id, tag);
 >   ALTER TABLE ONLY public.form_tag DROP CONSTRAINT form_tag_pk;
       public            postgres    false    244    244            �           2606    16461    group group_pk 
   CONSTRAINT     N   ALTER TABLE ONLY public."group"
    ADD CONSTRAINT group_pk PRIMARY KEY (id);
 :   ALTER TABLE ONLY public."group" DROP CONSTRAINT group_pk;
       public            postgres    false    225            �           2606    16478    location location_pk 
   CONSTRAINT     R   ALTER TABLE ONLY public.location
    ADD CONSTRAINT location_pk PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.location DROP CONSTRAINT location_pk;
       public            postgres    false    227            �           2606    16496    news news_pk 
   CONSTRAINT     J   ALTER TABLE ONLY public.news
    ADD CONSTRAINT news_pk PRIMARY KEY (id);
 6   ALTER TABLE ONLY public.news DROP CONSTRAINT news_pk;
       public            postgres    false    229            �           2606    16534    news_status news_status_pk 
   CONSTRAINT     X   ALTER TABLE ONLY public.news_status
    ADD CONSTRAINT news_status_pk PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.news_status DROP CONSTRAINT news_status_pk;
       public            postgres    false    235            �           2606    16410    token token_pk 
   CONSTRAINT     o   ALTER TABLE ONLY public.token
    ADD CONSTRAINT token_pk PRIMARY KEY (user_id, token_type_id, oid, "unique");
 8   ALTER TABLE ONLY public.token DROP CONSTRAINT token_pk;
       public            postgres    false    217    217    217    217            �           2606    16427    token_status token_status_pk 
   CONSTRAINT     Z   ALTER TABLE ONLY public.token_status
    ADD CONSTRAINT token_status_pk PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.token_status DROP CONSTRAINT token_status_pk;
       public            postgres    false    216            �           2606    16425    token_type token_type_pk 
   CONSTRAINT     V   ALTER TABLE ONLY public.token_type
    ADD CONSTRAINT token_type_pk PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.token_type DROP CONSTRAINT token_type_pk;
       public            postgres    false    214            �           2606    16417    user user_pk 
   CONSTRAINT     L   ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pk PRIMARY KEY (id);
 8   ALTER TABLE ONLY public."user" DROP CONSTRAINT user_pk;
       public            postgres    false    219            �           2606    16423    user_status user_status_pk 
   CONSTRAINT     X   ALTER TABLE ONLY public.user_status
    ADD CONSTRAINT user_status_pk PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.user_status DROP CONSTRAINT user_status_pk;
       public            postgres    false    212            �           2606    16421    user_type user_type_pk 
   CONSTRAINT     T   ALTER TABLE ONLY public.user_type
    ADD CONSTRAINT user_type_pk PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.user_type DROP CONSTRAINT user_type_pk;
       public            postgres    false    210            �   0   x�3��OJ,��y\��
.�ŉE
��i�%�\Ɯ�9�%0^� m�%      �      x������ � �      �      x�3�t�.�L�2�t��H,(-����� L �      �      x������ � �      �      x�3�t�.�L�2�t��H,(-����� L �      �   a   x�]��	� D��l6`��U�m����ǣ	|�*����9;��b��[��ϵ�4�&/����b���8G����Z��;�tnD����      �      x������ � �      �   N   x�3�I�I�Pp�,I-��M�2���sr��d�sq�df$�sY%�9��\f���9�ŉ�\1z\\\ ��      �      x�31�,N�21�LO�����  �E      �   (   x�3�t�2�t�2�t�2�t�2���2���w����� M8�      �   Q   x�=͡�0Q�VA��$�H
�
���g0p�����^"}�������b�=��M���h(�H�;	u��r�:�&      �      x������ � �      �      x�3�t�.�L�2�t��H,(-����� L �      �   0  x�m�ٮ�LE�9O�/@�f�;�TP4��*QDA�����t�v8��V6|+����$ r(�}H=W�ȧL�DU���I�6;f�8����NG�puw���2���
ޭ�k�X_������ؖ�!s~�$X? $E����/Se@��_��|�/'��P� �W��8�K�h����r=}ݾ5����Ω:[m{A7�{V�b.���ħA�ۛ�6����.�YU�ى5 j@�����AҠ�E�F9P��8p5�].�@-
g��{:|#�N��.�NN鸌9�]��E\bg�\����Rk������z8��^$?ٟ�����RL�p��i�`�cEu�j�ǩ%�M�ִ�s��s�9�����v�ys��ʰ�����r'��O6�dc��E5|nN��E��I�W��S 6z�$��G�>R0�Ѹ�'�EQ^��q:'����_⾗��j�ge��h;�F�4��x�*�f�u��j��Y�ӕ�O���1G�,��q��|�ԭ"� (���IY��u��Fd����&�pĂ�b:�����n/��&ݶD��VF>�oI�����_�%cDBc>r=������Zк���R[����k���+KVf��7o<!ř��J?΃�:�N:��gY�j��r��Z2���M}�P,�O\A�&]��P�u��}ٲ�d2��y��G:�Ν��Z ���!^���(1��lU�^ڳo,��x��G���o]2<Gp�\츸^!O�M�p׆��V�*0�*�.�k�a߼�L+���,�x;=f���\�q��ҟ���x���>W��Ϗ��� �3uq      �   )   x�3�tL.�,K�2�J-��NM�2�ҊR�3��=... ��
<      ~      x�3�tJM,J-�2�t����L����� Ln�      �   |  x���ݖBP��k�õ�O8uISQBH�Ys�3*J���Zy�y��[��7��	/��<��ȺA��������swbXZg�U��b3��mW;ȅ�׭`���{�^��4��'[8F`������EMH����6�p�S�W^U@6��kII+��0O�4P�O�R��}�A�E4�c��
}E���ՙI�E�"�Wϯnׄ\�������UI�䕬�����F�s[R���ʱ)����7��C���s*�+�d��n
���3�z�u���Ͼ#���j��,�{����!��;)_�I�I{�e�@���*��=7����?�t|��欽Xpx�(j��p���}Et��`����n���|��0��w�Y��� ��      |      x�3�t�.�L�2�t��H,(-����� L �      z       x�3�tL����2��N,�L,O������ T6Y     
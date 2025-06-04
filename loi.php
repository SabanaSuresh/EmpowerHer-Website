<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=empowerher_db;charset=utf8', 'root', '');

$detailsLois = [
    "Declaration of Sentiments" => [
        "pays" => "Seneca Falls, New York, États-Unis",
        "date" => "1848",
        "description" => "La Declaration of Sentiments est un document fondateur du mouvement féministe américain...",
        "impact" => "Ce document marque le début officiel du mouvement féministe organisé aux États-Unis."
    ],
    "Droit de vote des femmes – Nouvelle-Zélande" => [
        "pays" => "Nouvelle-Zélande",
        "date" => "1893",
        "description" => "En 1893, la Nouvelle-Zélande devient le premier pays au monde à accorder le droit de vote aux femmes lors des élections parlementaires nationales. Ce progrès est le résultat d'une campagne intense menée par des militantes telles que Kate Sheppard et la Woman’s Christian Temperance Union (WCTU), qui ont recueilli près de 32 000 signatures pour une pétition en faveur du suffrage féminin.",
        "impact" => "L'adoption de l'Electoral Act a permis aux femmes néo-zélandaises, y compris les femmes maories, de voter pour la première fois lors des élections législatives du 28 novembre 1893. Ce droit a renforcé la participation politique des femmes et a servi de modèle pour d'autres pays."
    ],
    "Loi sur le droit de vote des femmes" => [
        "pays" => "Royaume-Uni",
        "date" => "1918",
        "description" => "La loi Representation of the People Act de 1918 accorde le droit de vote aux femmes britanniques de plus de 30 ans qui remplissent certaines conditions de propriété. Elle a été promulguée après une longue campagne menée par des militantes comme Emmeline Pankhurst et les suffragettes, qui ont mené des actions militantes pour attirer l'attention sur leur cause. Bien que cette loi ait été une victoire importante, elle ne concernait qu'une fraction des femmes, excluant celles de moins de 30 ans et celles qui ne possédaient pas de biens.",
        "impact" => "Le suffrage féminin en 1918 est une avancée majeure pour l'égalité politique au Royaume-Uni, bien qu'il ne soit pas complet. Il a ouvert la voie à l'égalité des sexes dans le domaine politique, et la loi a été suivie en 1928 par l'extension du droit de vote à toutes les femmes de plus de 21 ans, égalisant ainsi les droits de vote entre hommes et femmes."
    ],
    "19e amendement de la Constitution (droit de vote des femmes)" => [
        "pays" => "États-Unis",
        "date" => "1920",
        "description" => "L'amendement 19 de la Constitution des États-Unis interdit toute discrimination dans l'exercice du droit de vote en raison du sexe, garantissant ainsi le droit de vote pour les femmes américaines. Ce droit a été acquis après un long combat mené par des militantes comme Susan B. Anthony et Elizabeth Cady Stanton. Leur travail a été soutenu par des campagnes de sensibilisation et des manifestations à travers le pays.",
        "impact" => "L'amendement a marqué une victoire historique pour les droits des femmes aux États-Unis, donnant aux femmes américaines un accès direct à la sphère politique. Ce droit a eu un impact profond sur l'influence des femmes dans la politique et a inspiré de nombreuses autres réformes sur l'égalité des sexes."
    ],
    "Droit de vote des femmes" => [
        "pays" => "France",
        "date" => "1944",
        "description" => "L'ordonnance du 21 avril 1944 accorde aux femmes françaises le droit de vote, un droit qu'elles avaient réclamé depuis des décennies. Ce droit est accordé par le gouvernement provisoire de la République française sous la présidence de Charles de Gaulle. Il a été octroyé après la Seconde Guerre mondiale, en reconnaissance de l'important rôle joué par les femmes dans la résistance et l'effort de guerre.",
        "impact" => "Cette ordonnance a constitué un pas décisif pour les droits politiques des femmes en France. Elle a permis aux femmes de participer pleinement à la vie politique du pays. Le droit de vote a été une étape clé dans la reconnaissance de l'égalité des sexes en France. Les premières élections où les femmes ont voté ont eu lieu en 1945."
    ],
    "Loi fondamentale de la République Fédérale d’Allemagne (égalité hommes/femmes devant la loi)" => [
        "pays" => "Allemagne",
        "date" => "1949",
        "description" => "La Loi fondamentale de 1949, adoptée après la Seconde Guerre mondiale, est la constitution de l'Allemagne de l'Ouest. Elle garantit l'égalité entre les sexes, stipulant que 'les hommes et les femmes sont égaux devant la loi'. Bien que ce texte ne se limite pas aux droits civils et politiques des femmes, il a jeté les bases d'une égalité juridique des sexes. La loi a été suivie de réformes législatives importantes pour l'égalité des droits dans la famille, le travail et les institutions.",
        "impact" => "La Loi fondamentale a constitué un ancrage juridique essentiel pour l'égalité des sexes en Allemagne. Elle a permis d'inclure des réformes légales pour la parité entre hommes et femmes dans de nombreux secteurs, y compris le marché du travail, l'éducation et la politique. Les femmes ont progressivement acquis de nouveaux droits en matière d'égalité salariale, de représentation politique et de participation dans les affaires publiques."
    ],
    "Constitution indienne (interdiction de la discrimination basée sur le sexe)" => [
        "pays" => "Inde",
        "date" => "1950",
        "description" => "La Constitution indienne, adoptée en 1950, interdit la discrimination fondée sur le sexe (Article 15) et garantit l'égalité de droits pour les femmes (Article 14). Ce texte est l'une des pierres angulaires de la lutte pour les droits des femmes en Inde. Bien que des lois spécifiques aient été introduites plus tard pour protéger les femmes contre la violence domestique et améliorer leurs conditions de travail, la Constitution a ouvert la voie à une législation progressive pour l'égalité des femmes.",
        "impact" => "La Constitution indienne a donné un cadre légal aux revendications féministes, en particulier dans la lutte contre la discrimination. Elle a permis de poser les bases de la législation en faveur de l'égalité des sexes et a servi de point de départ pour d'autres réformes législatives sur les droits des femmes en Inde. Elle a également contribué à l'accès des femmes à l'éducation, aux emplois et à la participation politique."
    ],
    "Droit de vote pour les femmes autochtones" => [
        "pays" => "Canada",
        "date" => "1960",
        "description" => "En 1960, le Canada a étendu le droit de vote aux femmes autochtones, qui en étaient jusqu'alors exclues, en vertu des modifications apportées à la loi Indian Act. Avant cela, les femmes autochtones étaient limitées par des restrictions qui les empêchaient de participer pleinement à la vie politique. Cette réforme a permis aux femmes des Premières Nations de participer aux élections fédérales, une mesure qui a été jugée essentielle pour reconnaître les droits politiques des femmes autochtones dans le pays. Cependant, de nombreuses communautés autochtones ont continué à avoir des systèmes politiques distincts, ce qui rend la question complexe.",
        "impact" => "Ce droit de vote a permis aux femmes autochtones de participer à la politique canadienne et a marqué un tournant dans la reconnaissance des droits civils pour les femmes au sein des communautés autochtones. Toutefois, ce droit n’a pas immédiatement entraîné une pleine égalité, car d'autres inégalités subsistaient dans l'accès aux ressources et aux droits sociaux. Cette réforme reste un symbole important dans la lutte pour les droits des femmes autochtones au Canada."
    ],
    "Loi sur l’égalité politique entre hommes et femmes" => [
        "pays" => "Espagne",
        "date" => "1976",
        "description" => "La loi de 1976 sur l'égalité politique entre hommes et femmes en Espagne a été introduite après la fin de la dictature franquiste. Elle visait à établir des bases légales pour l'égalité des sexes dans la politique espagnole. Cette législation a été cruciale pour permettre une plus grande représentation des femmes dans les structures politiques et pour garantir leur droit à participer à la vie publique sans discrimination fondée sur le sexe. La loi a marqué un tournant dans les réformes sociales et politiques qui ont suivi la transition vers la démocratie en Espagne.",
        "impact" => "Cette loi a facilité l'inclusion des femmes dans les structures de pouvoir en Espagne, ce qui a permis d'augmenter leur participation politique. Cependant, la parité n’a été pleinement abordée qu’avec des réformes ultérieures dans les années 2000, comme les lois de quotas électoraux qui ont renforcé la présence des femmes dans les institutions."
    ],
    "Convention sur l’élimination de toutes les formes de discrimination à l’égard des femmes (CEDAW)" => [
        "pays" => "Organisation des Nations Unies (ONU)",
        "date" => "1979",
        "description" => "La CEDAW est un traité international adopté par l'Assemblée générale des Nations Unies en 1979, visant à promouvoir les droits des femmes et à éliminer les discriminations fondées sur le sexe. La convention a établi des normes minimales pour l’égalité des droits entre hommes et femmes dans divers domaines, tels que l’éducation, le travail, la participation politique, et l’accès à la santé. Chaque pays qui signe la CEDAW doit soumettre des rapports réguliers à l’ONU sur les mesures qu’il prend pour respecter ces engagements.",
        "impact" => "La CEDAW a été un outil fondamental pour la reconnaissance des droits des femmes dans le monde entier, en fournissant un cadre juridique pour l’égalité de genre. Bien que la CEDAW ait conduit à des progrès importants dans de nombreux pays, sa mise en œuvre varie considérablement d’un État à l’autre. Elle reste néanmoins un instrument crucial dans la lutte internationale pour l'égalité des sexes."
    ],
    "Droit de vote des femmes - Koweït" => [
        "pays" => "Koweït",
        "date" => "2005",
        "description" => "Le Koweït a accordé le droit de vote aux femmes en 2005, devenant ainsi l’un des derniers pays du Golfe à accorder ce droit. Avant cela, les femmes koweïtiennes n'avaient pas le droit de participer aux élections nationales, bien qu'elles aient eu accès à certaines formes d’éducation et de travail. La loi a été adoptée après des décennies de campagnes menées par des militantes féministes locales. La loi a permis aux femmes de voter pour la première fois lors des élections parlementaires de 2006.",
        "impact" => "L'adoption de cette loi a marqué une avancée majeure pour les droits des femmes au Koweït, et elle a été un exemple pour d'autres pays de la région. Cependant, bien que les femmes aient obtenu ce droit, elles continuent de faire face à des restrictions dans d'autres domaines de la société, notamment dans le domaine de la représentation politique et des droits familiaux."
    ],
    "Loi sur la parité politique (représentation des femmes en politique)" => [
        "pays" => "Argentine",
        "date" => "2019",
        "description" => "En 2019, l'Argentine a adopté une loi sur la parité des genres dans la représentation politique, garantissant que les listes électorales doivent comporter autant de candidats et de candidates, avec un équilibre entre hommes et femmes. Cette loi a été conçue pour renforcer la représentation des femmes dans les organes législatifs et améliorer leur participation à la prise de décision politique. La loi est entrée en vigueur à temps pour les élections législatives de 2019.",
        "impact" => "Cette loi représente un progrès significatif dans la lutte pour l'égalité des sexes en Argentine. En garantissant une parité dans les listes électorales, elle permet aux femmes de participer de manière plus égale à la politique. Cette législation a été saluée comme un modèle pour d'autres pays d'Amérique latine et du monde entier. Elle contribue également à un changement culturel en faveur de l’égalité des sexes dans la sphère politique."
    ],
    "Réforme du code électoral – quotas de genre" => [
        "pays" => "Tunisie",
        "date" => "2011",
        "description" => "Après la Révolution tunisienne de 2011, le pays a entrepris une série de réformes constitutionnelles et législatives. En 2011, la Tunisie a introduit une réforme du code électoral imposant des quotas de genre pour les élections législatives et municipales. Cette réforme a été inscrite dans la nouvelle Constitution de 2014, qui garantit la parité totale entre hommes et femmes dans les listes électorales. Concrètement, la loi stipule que les partis politiques doivent présenter des listes de candidats où les hommes et les femmes alternent par ordre de priorité. Cette loi a été mise en place pour assurer une représentation équitable des femmes dans les instances politiques.",
        "impact" => "La réforme de 2011 et la parité inscrite dans la Constitution de 2014 ont été des avancées majeures pour les droits des femmes en Tunisie. La loi sur la parité a permis aux femmes tunisiennes d’obtenir une représentation égale au sein des institutions politiques, marquant une première dans le monde arabe. Cela a ouvert la voie à une participation accrue des femmes dans les processus de décision publique, et la Tunisie est souvent citée comme un modèle de progrès en matière de droits des femmes dans la région. Cette réforme a aussi permis de changer les mentalités et d'encourager davantage de femmes à s'engager en politique."
    ],
    "Constitution sud-africaine (égalité des sexes garantie)" => [
        "pays" => "Afrique du Sud",
        "date" => "1996",
        "description" => "La Constitution sud-africaine, adoptée en 1996 après la fin de l’apartheid, garantit l'égalité des sexes dans ses articles 9 et 10, interdisant toute discrimination basée sur le sexe, la race, la classe sociale ou toute autre distinction. Ce texte fondateur a été élaboré pour réparer les inégalités historiques subies par les femmes, en particulier celles des populations noires et des communautés marginalisées. Elle accorde aux femmes le droit d’accéder à des emplois, à l’éducation et à une participation égale dans la vie publique. Cette Constitution est l'un des documents les plus progressistes en matière de droits humains, et elle inclut des dispositions spécifiques pour protéger les femmes contre la violence et les abus. La loi a également permis la mise en place d'autres politiques favorisant l'égalité des sexes.",
        "impact" => "La Constitution sud-africaine est une étape historique dans la lutte pour l'égalité des sexes en Afrique du Sud. Elle a permis d'améliorer la position des femmes dans la société en matière de droit au travail, à l’éducation et à la protection contre la violence. Elle a également été la base de nombreuses autres lois et politiques visant à réduire les inégalités entre hommes et femmes, notamment des lois sur les violences domestiques et les droits reproductifs. L'Afrique du Sud a fait des progrès importants dans l'éradication de la discrimination sexiste, bien que des défis subsistent, notamment en ce qui concerne la violence sexuelle et l'accès égal aux opportunités économiques."
    ],
    "Droit de conduire pour les femmes" => [
        "pays" => "Arabie Saoudite",
        "date" => "2018",
        "description" => "En 2018, l'Arabie Saoudite a levé l'interdiction qui empêchait les femmes de conduire. Cette mesure a été prise dans le cadre des réformes sociales du prince héritier Mohammed ben Salmane, qui a cherché à moderniser le pays et à donner plus de libertés aux femmes saoudiennes. La décision a été saluée comme un grand pas en avant dans l'autonomisation des femmes en Arabie Saoudite, bien qu'elle ne résolve pas d'autres problèmes de droits des femmes dans le pays, tels que la nécessité d'une tutelle masculine pour de nombreuses décisions personnelles et légales. La levée de l’interdiction de conduite est un signe de changement, mais elle reste symbolique tant que des restrictions plus larges existent.",
        "impact" => "Cette réforme a permis aux femmes saoudiennes de disposer d'une plus grande autonomie, facilitant leurs déplacements, leur accès au travail et leur indépendance personnelle. Bien que cette mesure ait eu un impact significatif sur les droits des femmes, elle est considérée par certains comme un changement partiel, car de nombreuses autres restrictions restent en place. Néanmoins, la levée de l'interdiction de conduire est un moment marquant dans le processus de réforme sociale en Arabie Saoudite. Les femmes qui conduisent maintenant peuvent participer plus activement à la vie sociale et économique du pays, ce qui est crucial pour leur émancipation."
    ],
    "Legalisation de la contraception" => [
        "pays" => "Royaume-Uni",
        "date" => "1967",
        "description" => "En 1967, le Royaume-Uni a légalisé l’accès à la contraception à travers la loi The Family Planning Act. Cette législation a permis aux femmes d’accéder à des méthodes contraceptives, ce qui était auparavant restreint par des lois morales et religieuses. Avant cette loi, la contraception était illégale ou très mal vue dans la société britannique. Cette réforme a permis d'améliorer le contrôle des femmes sur leur santé reproductive et de réduire le nombre de grossesses non désirées.",
        "impact" => "Cette législation a eu un impact majeur sur l'autonomisation des femmes en leur permettant de prendre des décisions éclairées concernant leur reproduction, ce qui est essentiel pour leur liberté et leur égalité dans la société. Elle a ouvert la voie à d'autres réformes concernant la santé reproductive des femmes, notamment dans l'accès à l'avortement. Le Royaume-Uni a été un pionnier dans l'introduction de l'accès à la contraception pour les femmes, ce qui a eu des répercussions sur la politique de nombreux autres pays."
    ],
    "Griswold v. Connecticut – droit à la contraception pour les couples mariés" => [
        "pays" => "États-Unis",
        "date" => "1965",
        "description" => "L’arrêt Griswold v. Connecticut de la Cour Suprême des États-Unis en 1965 a établi le droit constitutionnel pour les couples mariés d’avoir accès à la contraception. Avant cet arrêt, l'État du Connecticut interdisait la vente de contraceptifs, même pour les couples mariés. La Cour Suprême a jugé que cette interdiction violait le droit à la vie privée protégé par la Constitution des États-Unis. Ce jugement a été un tournant important pour les droits des femmes et a ouvert la voie à d'autres décisions juridiques favorisant l'égalité des sexes en matière de droits reproductifs.",
        "impact" => "Cette décision a renforcé le droit des femmes à prendre des décisions éclairées concernant leur santé reproductive et leur vie familiale. Elle a été un élément fondamental dans la lutte pour la liberté reproductive des femmes et a précipité des changements législatifs importants dans d’autres États et au niveau fédéral, notamment en ce qui concerne le droit à l'avortement et l’accès aux soins de santé."
    ],
    "Loi Neuwirth – Autorisation de la contraception" => [
        "pays" => "France",
        "date" => "1967",
        "description" => "La loi Neuwirth, votée en 1967, a légalisé la contraception en France, mettant fin à une période où l’utilisation de contraceptifs était illégale. Avant cette loi, les femmes étaient contraintes à des méthodes naturelles ou à des avortements illégaux. La loi a permis l’introduction de la pilule contraceptive et d'autres formes de contraception. Ce changement a marqué un moment décisif dans la libération des femmes, en leur offrant une plus grande maîtrise sur leur reproduction.",
        "impact" => "La loi Neuwirth a été un point tournant majeur dans l'histoire des droits des femmes en France, permettant à ces dernières de prendre le contrôle de leur fertilité. Elle a été un fondement essentiel pour d’autres réformes liées à la santé reproductive, comme l’avortement, en donnant aux femmes un outil pour éviter les grossesses non désirées. Cela a permis une meilleure égalité entre hommes et femmes dans la société, notamment dans les domaines de l'éducation et de l'emploi."
    ],
    "Legalisation de l’avortement – arrêt Roe v. Wade" => [
        "pays" => "États-Unis",
        "date" => "1973",
        "description" => "Dans l'arrêt Roe v. Wade de 1973, la Cour Suprême des États-Unis a légalisé l’avortement en invoquant le droit constitutionnel à la vie privée. Cette décision historique a été un pilier de la liberté reproductive, en permettant aux femmes de choisir d’interrompre une grossesse dans un cadre légal. Avant cette décision, l’avortement était illégal ou fortement restreint dans de nombreux États. L'arrêt a établi que les femmes avaient le droit de décider de l’avortement pendant le premier trimestre de la grossesse.",
        "impact" => "La légalisation de l'avortement a été un moment historique pour les droits des femmes, en leur donnant le contrôle de leur corps et de leur avenir. Elle a permis aux femmes d’accéder à des soins médicaux sûrs et légaux et a ouvert la voie à un mouvement plus large en faveur des droits reproductifs. Cependant, bien que Roe v. Wade ait marqué un grand progrès, les débats sur l’avortement continuent de diviser les États-Unis, et des efforts ont été faits pour restreindre l'accès à l'avortement dans certains États."
    ],
    "Loi sur l’interruption volontaire de grossesse (IVG)" => [
        "pays" => "France",
        "date" => "1975",
        "description" => "La loi Veil, adoptée en 1975, a légalisé l'avortement en France. Cette loi, proposée par la ministre de la Santé Simone Veil, a été un acte fondateur dans la lutte pour les droits des femmes. Avant cette loi, l'avortement était illégal en France, sauf dans des cas très restreints. La loi a permis aux femmes de choisir d’interrompre une grossesse de manière légale et sécurisée, en établissant un cadre qui protège la santé et les droits des femmes.",
        "impact" => "La loi Veil a permis une avancée décisive dans la reconnaissance du droit des femmes à disposer de leur corps. Elle a ouvert la voie à une meilleure égalité entre hommes et femmes dans la société, en permettant aux femmes de prendre des décisions sur leur reproduction. Bien que l’avortement soit légal en France, la question reste politique et sociale, avec des débats sur la durée de la grossesse et la possibilité d'un accès plus facile à l'IVG dans certaines régions."
    ],
    "Dépénalisation de l’avortement" => [
        "pays" => "Australie (État de Victoria)",
        "date" => "1983",
        "description" => "L'État de Victoria en Australie a dépénalisé l’avortement en 1983 par la loi Abortion Law Reform Act. Avant cette législation, l’avortement était illégal dans de nombreux États australiens, à l'exception des situations où la vie de la femme était en danger. La réforme a permis aux femmes d'accéder à l'avortement en toute sécurité et de manière légale, et elle a été un tournant dans la reconnaissance des droits reproductifs des femmes en Australie. Cette réforme a également instauré des critères légaux permettant aux femmes d’interrompre une grossesse en toute légalité pendant un certain délai.",
        "impact" => "Cette loi a permis aux femmes australiennes d'accéder à un avortement sûr et légal, ce qui a renforcé leur autonomie et leur droit à disposer de leur corps. Cependant, les lois sur l’avortement en Australie varient selon les États, ce qui entraîne des inégalités d’accès. Les réformes de Victoria ont été un modèle pour d'autres États, mais des défis demeurent concernant l'accès à l'avortement dans tout le pays."
    ],
    "Loi sur la santé sexuelle et reproductive" => [
        "pays" => "Espagne",
        "date" => "2002",
        "description" => "En 2002, l'Espagne a adopté une loi sur la santé sexuelle et reproductive qui a permis de renforcer les droits des femmes en matière de contraception et d'avortement. Cette loi garantissait l'accès à des services de santé reproductifs, y compris l'éducation sexuelle, la contraception, ainsi que l'avortement dans des conditions légales. L'Espagne, bien que précurseur en Europe dans certaines réformes de la santé reproductive, a aussi apporté un cadre juridique plus souple pour l'IVG, notamment pour les femmes victimes de violences sexuelles ou dans des situations de danger pour leur santé.",
        "impact" => "Cette loi a eu un impact direct en donnant aux femmes espagnoles plus d'autonomie et de contrôle sur leur santé reproductive. Elle a été l'un des premiers pas vers la légitimation d'un droit de choix pour les femmes concernant la maternité et l'accès à des services médicaux sûrs. L'Espagne a ainsi fait avancer les droits des femmes en matière de santé et a fait face à des pressions sociales et politiques pour garantir une meilleure égalité dans l'accès aux soins."
    ],
    "Loi sur les droits sexuels et reproductifs" => [
        "pays" => "Mexique (État de Mexico)",
        "date" => "2010",
        "description" => "En 2010, l'État de Mexico a légalisé l'avortement jusqu'à 12 semaines de grossesse, ce qui a marqué une avancée importante pour les droits des femmes dans le pays. Cette loi a permis de légaliser l'interruption volontaire de grossesse dans le cadre d'une législation qui protégeait la santé et les droits reproductifs des femmes. Cette décision a été l'un des moments clés de la lutte pour les droits des femmes au Mexique et a permis de lever de nombreuses restrictions sur l'accès à l'avortement, qui, dans d'autres États mexicains, restait très limité.",
        "impact" => "Cette loi a été un grand pas vers la libération des femmes mexicaines en matière de santé reproductive. En garantissant l'accès à l'IVG dans des conditions sûres et légales, elle a permis aux femmes de disposer de leur corps et d'avoir un contrôle direct sur leur fertilité. Cependant, la loi a suscité des débats et des oppositions dans d'autres États du Mexique, où l'accès à l'avortement reste restreint."
    ],
    "Legalisation de l’avortement" => [
        "pays" => "Irlande",
        "date" => "2018",
        "description" => "L'Irlande a légalisé l'avortement en 2018 après une révision constitutionnelle. Le The Health (Regulation of Termination of Pregnancy) Act a été adopté après un référendum populaire, qui a abrogé la Huitième Amendement de la Constitution irlandaise, une disposition qui interdisait strictement l'avortement. L'adoption de cette loi a permis aux femmes d'accéder à l'avortement sur demande pendant les premières 12 semaines de grossesse et dans des circonstances spécifiques après cette période.",
        "impact" => "Cette réforme a été un changement radical pour les droits des femmes en Irlande, où l'avortement était auparavant illégal dans presque toutes les circonstances, y compris les cas de malformation fœtale ou de risque pour la santé de la mère. La légalisation de l'avortement a permis de garantir des soins de santé sûrs et accessibles pour les femmes, et elle a également montré que les droits reproductifs sont une question de justice sociale et d'égalité entre les sexes. Cette loi a été saluée comme un progrès majeur pour les femmes irlandaises, mais elle reste un sujet de débat dans certaines régions conservatrices du pays."
    ],
    "Droit à l’avortement inscrit dans la loi" => [
        "pays" => "Argentine",
        "date" => "2022",
        "description" => "L'Argentine a légalisé l'avortement en 2020 grâce à l'adoption de la Ley 27.610, qui permet aux femmes d'interrompre leur grossesse jusqu'à la 14e semaine. La loi a été le résultat de plusieurs années de lutte féministe dans le pays, où les activistes ont organisé des manifestations massives, souvent appelées Verde Marea (la marée verte), pour la légalisation de l'IVG. Ce texte a mis l'accent sur l'accès à des soins de santé sûrs et a souligné que les femmes doivent avoir la liberté de choisir de manière autonome.",
        "impact" => "La loi de 2020 a représenté un tournant décisif pour les droits des femmes en Argentine, un pays avec des racines catholiques et où l'avortement était auparavant interdit, sauf dans des cas très spécifiques. Ce changement a permis aux femmes argentines d'obtenir un accès légal à l'avortement, réduisant les risques liés aux avortements clandestins et offrant un cadre sécurisé pour les femmes. L'Argentine est ainsi devenue le premier pays en Amérique Latine à légaliser l'IVG, et cela a servi de modèle pour d'autres nations de la région."
    ],
    "Loi sur l’accès à la contraception gratuite pour les jeunes femmes" => [
        "pays" => "France",
        "date" => "2023",
        "description" => "En 2023, la France a mis en place une loi permettant aux jeunes femmes de moins de 25 ans d’accéder gratuitement à la contraception, y compris la pilule, le dispositif intra-utérin (DIU) et les implants contraceptifs. Cette loi a été introduite dans le but de réduire les inégalités d'accès à la contraception et d'encourager une meilleure gestion de la santé reproductive des jeunes femmes. Elle vise aussi à réduire le nombre de grossesses non désirées et à donner aux jeunes femmes les moyens de choisir librement quand et comment avoir des enfants.",
        "impact" => "Cette loi a été une avancée importante pour les droits des femmes en France, en permettant un meilleur accès à la contraception et en réduisant les barrières économiques. Elle permet aux jeunes femmes de disposer d’un contrôle complet sur leur santé reproductive, contribuant ainsi à leur autonomie et à leur égalité dans la société. Cela représente un progrès vers l'égalité des sexes en matière de santé et d’opportunités pour les jeunes femmes."
    ],
    "Dépénalisation totale de l’avortement" => [
        "pays" => "Colombie",
        "date" => "2021",
        "description" => "En 2021, la Cour constitutionnelle colombienne a dépénalisé l'avortement jusqu'à 24 semaines de grossesse, marquant un tournant dans les droits reproductifs des femmes en Colombie. Avant cette décision, l'avortement était légal uniquement dans des circonstances strictes (menace pour la santé de la mère, malformation grave du fœtus, viol). La décision a permis de rendre l'avortement accessible à toutes les femmes pendant les 24 premières semaines de grossesse, offrant ainsi plus de sécurité et de justice sociale aux femmes colombiennes.",
        "impact" => "Cette dépénalisation a permis aux femmes colombiennes d’accéder à des services de santé reproductive sûrs et légaux, mettant fin à des pratiques illégales et dangereuses. Cela a été un pas crucial vers l’autonomie des femmes, leur permettant de faire des choix éclairés concernant leur reproduction sans crainte de poursuites judiciaires. Cela a également été un signal fort de soutien aux droits des femmes dans la région, où l’accès à l’avortement reste encore largement restreint dans de nombreux autres pays."
    ],
    "Reconnaissance du droit à l’IVG dans la Constitution" => [
        "pays" => "France",
        "date" => "2024",
        "description" => "En 2024, la France a inscrit dans sa Constitution le droit à l'Interruption Volontaire de Grossesse (IVG). Ce changement constitutionnel est une garantie pérenne de l'accès à l'avortement, en réponse aux tentatives de révision législative visant à restreindre ce droit dans d'autres pays et à protéger le droit des femmes face à toute tentative de remise en cause de la loi Veil. Ce droit constitutionnel renforcé garantit aux femmes françaises une protection juridique contre toute tentative d’interdiction ou de limitation de l’avortement.",
        "impact" => "Cette inscription dans la Constitution est une étape importante pour la préservation et la protection des droits reproductifs en France. Elle assure la pérennité du droit à l'IVG et montre que la France place la liberté reproductive des femmes comme un pilier fondamental des droits humains. Cela pourrait aussi avoir un impact symbolique fort à l’international, en montrant l’engagement de la France pour les droits des femmes."
    ],
    "Interdiction des mutilations génitales féminines (MGF)" => [
        "pays" => "Kenya",
        "date" => "2003",
        "description" => "Le Kenya a été l’un des premiers pays d’Afrique de l’Est à interdire légalement les mutilations génitales féminines (MGF), également appelées excision ou infibulation. Dès 2003, des dispositions pénales ont été introduites dans la loi sur les enfants (Children Act) pour interdire ces pratiques, renforcées par une législation plus spécifique en 2011 (Prohibition of FGM Act). La loi interdit la pratique, la facilitation, ou même l’incitation à pratiquer les MGF, y compris à l’étranger.",
        "impact" => "Les MGF sont une atteinte grave à l’intégrité physique et aux droits fondamentaux des filles et des femmes. Leur interdiction envoie un signal fort de rupture avec des traditions patriarcales violentes. Cette législation protège des millions de jeunes filles contre une pratique qui entraîne de lourdes séquelles physiques, psychologiques et sexuelles. Elle contribue à changer les mentalités à travers des programmes d’éducation, en lien avec les ONG et les leaders communautaires."
    ],
    "Accès légal à l’avortement – Loi Veil élargie" => [
        "pays" => "France",
        "date" => "2001",
        "description" => "La loi de 2001 vient élargir le cadre de la loi Veil de 1975. Elle porte notamment le délai légal pour recourir à une IVG de 10 à 12 semaines de grossesse. Elle renforce également le droit à l'information et à la contraception, supprime l'obligation de l'autorisation parentale pour les mineures (remplacée par l'accompagnement d’un adulte), et améliore les conditions d’accueil dans les établissements de santé. Elle marque une volonté d’adapter la loi aux réalités sociales et médicales contemporaines.",
        "impact" => "Cette loi permet un accès plus large et plus sécurisé à l’IVG, en particulier pour les femmes en situation de précarité ou confrontées à des délais médicaux. En facilitant les démarches, elle contribue à réduire les souffrances psychologiques et physiques associées à des avortements tardifs ou clandestins. Elle traduit une volonté de respecter l’autonomie des femmes dans leur parcours de santé reproductive."
    ],
    "Loi sur l'égalité de rémunération (Equal Pay Act)" => [
        "pays" => "États-Unis",
        "date" => "1963",
        "description" => "La loi Equal Pay Act de 1963 a été un jalon majeur dans la lutte contre la discrimination salariale aux États-Unis. Elle visait à interdire la pratique consistant à verser un salaire inférieur à des employés de sexe différent pour un travail de même valeur dans une même entreprise. Bien que cette loi ait été un progrès significatif pour les femmes, elle a aussi révélé des défis persistants dans l'application de l'égalité salariale, notamment dans le cas des 'emplois de comparable valeur' où la distinction salariale n'était pas toujours aussi évidente.",
        "impact" => "Cette loi a été un premier pas vers la reconnaissance légale de l'égalité salariale entre hommes et femmes. Elle a forcé les entreprises à réévaluer leurs pratiques salariales et à offrir des salaires égaux pour des travaux similaires. Cependant, des inégalités salariales subsistent encore, et cette loi a été étendue au fil du temps par d'autres législations visant à combler les lacunes."
    ],
    "Loi sur l’égalité professionnelle entre les femmes et les hommes" => [
        "pays" => "France",
        "date" => "1972",
        "description" => "La loi du 22 mai 1972, également appelée Loi Roudy, est l'une des premières législations françaises qui a imposé l'égalité de traitement entre les femmes et les hommes dans le domaine de l'emploi, notamment en matière de salaires. Elle stipule que les employeurs doivent garantir un salaire égal pour un travail égal ou de valeur égale. Cette loi a été un tournant en France, car elle a officiellement reconnu la discrimination salariale en raison du sexe et a introduit des mesures pour y mettre fin.",
        "impact" => "Cette loi a été une avancée significative pour les droits des femmes dans le monde du travail, en particulier dans la lutte contre les inégalités salariales. Cependant, son application a été un défi, et il a fallu des décennies pour que des mécanismes de contrôle et de sanction plus efficaces soient mis en place pour garantir son efficacité."
    ],
    "Loi fédérale sur l’égalité entre femmes et hommes" => [
        "pays" => "Suisse",
        "date" => "1995",
        "description" => "La loi fédérale suisse sur l'égalité a été adoptée en 1995 pour interdire les discriminations fondées sur le sexe dans le milieu de travail, notamment en matière de salaire. Elle a été introduite après la révision de la Constitution suisse en 1981, où le principe d'égalité entre les sexes a été inscrit. La loi impose aux entreprises de garantir une égalité de rémunération entre hommes et femmes pour un travail de valeur égale et de prévenir toute forme de discrimination liée au sexe dans l'emploi.",
        "impact" => "La loi a permis une avancée législative en Suisse, mais les femmes continuent à rencontrer des obstacles dans la mise en œuvre de l'égalité salariale. Malgré les progrès réalisés, la Suisse reste l'un des pays d'Europe avec un écart salarial important entre les sexes. Cependant, la loi a mis en place des mécanismes pour surveiller et rapporter les écarts salariaux entre hommes et femmes."
    ],
    "Directive européenne sur l’égalité de rémunération" => [
        "pays" => "Union européenne",
        "date" => "1975",
        "description" => "La Directive 75/117/CEE de l'Union européenne a été adoptée en 1975 pour interdire la discrimination salariale fondée sur le sexe au sein de l'UE. Elle stipule que les hommes et les femmes doivent recevoir un salaire égal pour un travail égal, en tenant compte des mêmes critères de rémunération. Bien que cette directive constitue un cadre juridique pour l'égalité salariale dans l'UE, son application a varié d'un pays à l'autre, et des écarts salariaux persistent.",
        "impact" => "Cette directive a été une étape fondamentale pour promouvoir l'égalité salariale dans l'UE. Elle a incité de nombreux États membres à adopter des lois nationales en matière d'égalité salariale. Toutefois, malgré les progrès réalisés, les femmes continuent de gagner moins que les hommes dans de nombreux pays de l'UE. Les directives successives ont également appelé à une plus grande transparence salariale pour aider à réduire l'écart."
    ],
    "Loi sur la promotion de l'égalité au travail" => [
        "pays" => "Japon",
        "date" => "1985",
        "description" => "Le Japon a adopté cette loi en 1985 afin de promouvoir l'égalité entre les sexes sur le lieu de travail. Elle visait à interdire la discrimination en matière de recrutement, d’avancement, de formation et de rémunération. Cette loi a été un pas important, car elle a permis d'améliorer la situation des femmes dans un pays où les traditions de rôle de genre étaient particulièrement enracinées.",
        "impact" => "Bien que cette loi ait marqué une avancée pour les droits des femmes au Japon, l'égalité réelle entre les sexes au travail demeure un défi. Les femmes japonaises continuent de faire face à un plafond de verre, notamment dans les grandes entreprises, et l'écart salarial entre les sexes reste élevé. Cependant, cette loi a posé les bases de futures réformes législatives."
    ],
    "Loi sur l'égalité de traitement entre hommes et femmes au travail" => [
        "pays" => "Royaume-Uni",
        "date" => "1975",
        "description" => "L'Equal Pay Act 1970 a été un texte législatif clé au Royaume-Uni, bien qu'il ait été adopté bien avant 1975. Il a rendu illégal le paiement d'un salaire inférieur aux femmes pour un travail de valeur égale. Il s'agissait de la première législation importante en matière d'égalité salariale au Royaume-Uni et a été un moteur dans la reconnaissance des droits des femmes en matière d'égalité au travail. Le texte a été renforcé et étendu par des législations européennes au fil du temps.",
        "impact" => "Cette loi a représenté une avancée importante, bien qu’elle n'ait pas permis d'éliminer totalement l'écart salarial entre hommes et femmes. Elle a cependant constitué une base légale pour les réclamations salariales des femmes et a contribué à la révision des conditions de travail des femmes dans tout le pays."
    ],
    "Loi sur l'égalité des sexes" => [
        "pays" => "Norvège",
        "date" => "2013",
        "description" => "La Norvège a adopté une loi sur l'égalité des sexes et la non-discrimination en 2013 pour assurer une meilleure égalité dans tous les secteurs, y compris le marché du travail. La loi oblige les employeurs à établir des actions et des objectifs spécifiques pour atteindre l'égalité salariale et favoriser l'égalité entre les sexes. Elle a également introduit des sanctions pour les entreprises qui ne respectent pas ces principes.",
        "impact" => "La loi a permis d'améliorer les conditions d'égalité au travail en Norvège, en introduisant des objectifs concrets pour l'égalité salariale et des mesures pour assurer une transparence salariale. Cependant, malgré ces efforts, l'égalité salariale n'a pas encore été totalement atteinte et demeure un sujet de préoccupation dans le pays."
    ],
    "Loi sur la transparence salariale" => [
        "pays" => "Islande",
        "date" => "2017",
        "description" => "En 2017, l'Islande a adopté une loi révolutionnaire obligeant toutes les entreprises de plus de 25 employés à certifier l'égalité salariale entre hommes et femmes. Les entreprises doivent désormais prouver qu'elles ne paient pas les femmes moins que les hommes pour un travail de valeur égale, et ce, via un processus de certification. La loi vise à éliminer les inégalités salariales en obligeant les employeurs à démontrer une transparence totale des salaires.",
        "impact" => "Cette loi est considérée comme l'une des plus ambitieuses au monde en matière de transparence salariale et a fait de l'Islande un leader mondial de l'égalité salariale. En obligeant les entreprises à démontrer l'égalité salariale, elle a un effet dissuasif sur la discrimination salariale et montre un engagement fort pour l'égalité des sexes. Cependant, certains estiment que la mise en œuvre complète de cette loi nécessite encore des ajustements."
    ],
    "Loi sur l'égalité de rémunération entre les sexes" => [
        "pays" => "Australie",
        "date" => "1972",
        "description" => "L'Australie a adopté en 1972 une législation sur l'égalité de rémunération pour les femmes, qui stipule que les hommes et les femmes doivent recevoir un salaire égal pour un travail de valeur égale. Cette loi a été l'une des premières dans le monde à interdire la discrimination salariale sur la base du sexe et a marqué une étape importante dans la lutte pour les droits des femmes au travail.",
        "impact" => "L'impact de cette loi a été considérable, bien que des écarts salariaux subsistent. Elle a ouvert la voie à des réformes supplémentaires en Australie et a inspiré d'autres pays à adopter des législations similaires. Toutefois, malgré les progrès, des disparités salariales persistent entre hommes et femmes, en particulier dans les secteurs à forte représentation féminine, comme l'éducation et la santé."
    ],
    "Loi sur l'équité salariale" => [
        "pays" => "Québec, Canada",
        "date" => "1996",
        "description" => "La Loi sur l'équité salariale du Québec, adoptée en 1996, a été une étape majeure pour garantir que les femmes reçoivent un salaire égal pour un travail de valeur égale. Elle oblige les employeurs à évaluer et ajuster les salaires dans leurs entreprises pour éliminer les écarts salariaux systémiques entre les sexes. La loi met en place un cadre législatif pour surveiller et corriger les discriminations salariales.",
        "impact" => "Cette loi a permis d'améliorer considérablement l'égalité salariale au Québec, bien qu'il subsiste encore des écarts dans certains secteurs. La législation québécoise est souvent citée comme un modèle de politique salariale équitable, et elle a inspiré d'autres provinces canadiennes à introduire des mesures similaires."
    ],
    "Loi sur le congé parental égalitaire" => [
        "pays" => "Espagne",
        "date" => "2019",
        "description" => "La loi espagnole sur le congé parental égalitaire, adoptée en 2019, a établi un congé parental de 16 semaines pour tous les parents, sans distinction de sexe, afin de favoriser une répartition plus équitable des responsabilités parentales entre hommes et femmes. Auparavant, les femmes bénéficiaient d'un congé maternité plus long que le congé paternité, ce qui renforçait les inégalités professionnelles entre les sexes.",
        "impact" => "Cette loi est importante car elle reconnaît que la répartition des tâches domestiques et parentales est un facteur clé des inégalités de genre. En donnant aux pères le même congé que les mères, la loi vise à briser les stéréotypes traditionnels de genre et à encourager un plus grand équilibre entre les sexes dans la prise en charge des enfants, ce qui permet aux femmes de mieux concilier vie professionnelle et vie familiale."
    ],
    "Loi contre le harcèlement sexuel au travail" => [
        "pays" => "Inde",
        "date" => "2006",
        "description" => "La loi sur le harcèlement sexuel au travail a été promulguée en Inde en 2006 après un long combat mené par des militantes, inspirées par l'affaire Vishaka v. State of Rajasthan (1997), qui a été un tournant dans la reconnaissance du harcèlement sexuel comme un problème systémique dans les lieux de travail. Cette loi impose aux employeurs de créer un comité interne pour traiter les plaintes de harcèlement sexuel et mettre en place des politiques de prévention.",
        "impact" => "Cette loi a été un progrès crucial pour la protection des femmes au travail en Inde, un pays où le harcèlement sexuel était largement ignoré jusque-là. Elle a donné aux femmes un cadre juridique pour dénoncer les abus et a forcé les entreprises à créer des mécanismes pour prévenir et traiter ces incidents. Cependant, son application reste inégale, et beaucoup de femmes hésitent encore à signaler les abus en raison de la stigmatisation et du manque de soutien."
    ],
    "Loi sur les quotas de genre dans le secteur public" => [
        "pays" => "Afrique du Sud",
        "date" => "2006",
        "description" => "En 2006, l'Afrique du Sud a introduit des quotas de genre dans le secteur public pour garantir une représentation égale des femmes et des hommes dans les postes de décision. La loi stipule que les autorités publiques doivent atteindre des objectifs spécifiques en matière de représentation des femmes dans leurs effectifs, en particulier dans les postes de direction.",
        "impact" => "Cette loi a permis une avancée significative dans la lutte pour l'égalité des sexes en Afrique du Sud, en particulier dans les sphères politiques et publiques. En imposant des quotas de genre, l'Afrique du Sud a cherché à surmonter les obstacles structurels qui empêchaient les femmes d'accéder à des postes de pouvoir. Cependant, cette mesure a parfois été critiquée pour sa nature contraignante et la question de savoir si elle a conduit à des changements réels sur le terrain."
    ],
    "Loi sur la lutte contre les discriminations salariales" => [
        "pays" => "Allemagne",
        "date" => "2022",
        "description" => "En 2022, l'Allemagne a introduit une législation renforçant l'égalité salariale entre hommes et femmes. La loi oblige les entreprises à publier des rapports sur les salaires et à rendre les écarts de rémunération entre sexes plus transparents. Les entreprises de plus de 200 employés sont tenues de justifier l'absence d'écarts salariaux dans leurs évaluations annuelles.",
        "impact" => "Cette loi marque une évolution importante pour l'égalité salariale en Allemagne, qui continue de faire face à un écart salarial significatif. En imposant la transparence et l'obligation de justifier les écarts, elle pousse les entreprises à prendre des mesures concrètes pour résoudre les inégalités salariales et améliore la capacité des femmes à revendiquer l'égalité de rémunération."
    ],
    "Loi Ferry – école gratuite, laïque et obligatoire pour tous les enfants" => [
        "pays" => "France",
        "date" => "1882",
        "description" => "La loi Ferry de 1882, portée par le ministre de l'Instruction publique, Jules Ferry, institue l'école gratuite, laïque et obligatoire pour tous les enfants, sans distinction de sexe. Cette loi marque un tournant décisif dans l'éducation en France en offrant un accès égalitaire à l'éducation, favorisant la scolarisation des filles et des garçons. Avant cette loi, l'éducation des filles était souvent négligée, et leur place dans les écoles était marginalisée.",
        "impact" => "L'introduction de l'école obligatoire pour les filles a eu un impact majeur sur les droits des femmes, en leur offrant une chance d'échapper à l'ignorance et de participer pleinement à la société. Elle a permis aux femmes d'accéder à des emplois plus diversifiés et a favorisé l'émancipation féminine. L'égalisation de l'accès à l'éducation est l'un des fondements de l'égalité des sexes en France."
    ],
    "19e amendement à la Constitution mexicaine – égalité d’accès à l’éducation" => [
        "pays" => "Mexique",
        "date" => "1917",
        "description" => "En 1917, le Mexique adopte le 19e amendement à sa Constitution, qui établit le principe d'égalité d'accès à l'éducation pour les hommes et les femmes. Cet amendement a joué un rôle crucial dans la démocratisation de l'éducation, en autorisant les filles à accéder à des établissements scolaires publics et privés.",
        "impact" => "Ce changement a été une avancée significative dans la lutte pour l'émancipation des femmes au Mexique, car il a permis aux femmes de recevoir une éducation formelle, leur offrant ainsi de nouvelles opportunités dans des domaines tels que la politique, la science et la culture. Avant ce changement, l'éducation des filles était souvent restreinte à des enseignements domestiques ou religieux, limitant leur participation dans la société."
    ],
    "Brown v. Board of Education – fin de la ségrégation raciale dans les écoles" => [
        "pays" => "États-Unis",
        "date" => "1954",
        "description" => "L'arrêt Brown v. Board of Education de 1954 a déclaré que la ségrégation raciale dans les écoles publiques était inconstitutionnelle, invalidant ainsi la doctrine 'séparés mais égaux' instaurée par l'arrêt Plessy v. Ferguson de 1896. Cet arrêt a eu des implications considérables pour l'égalité des droits et a été un moment clé de la lutte pour les droits civiques aux États-Unis.",
        "impact" => "Bien que l'arrêt Brown v. Board de 1954 ne se concentre pas spécifiquement sur les droits des femmes, il a indirectement favorisé les filles noires en leur ouvrant l'accès à des écoles de qualité égale à celles des garçons blancs. Cette décision a contribué à la lutte pour l'égalité dans le système éducatif et a inspiré d'autres mouvements visant à garantir l'égalité des sexes et des races dans tous les domaines, y compris l'éducation."
    ],
    "Loi sur l'éducation des filles (Girl’s Education Act)" => [
        "pays" => "Nigeria",
        "date" => "1960",
        "description" => "La loi sur l'éducation des filles, promulguée en 1960 au Nigeria, a été une étape importante pour améliorer l'accès à l'éducation pour les filles dans ce pays. Cette loi a abordé les problèmes de disparité entre les sexes dans l'éducation, en établissant des mesures visant à encourager l'inscription des filles à l'école et à offrir un environnement éducatif sans discrimination.",
        "impact" => "En favorisant l'éducation des filles, cette loi a eu un impact considérable sur le statut des femmes au Nigeria, un pays où la tradition et la culture ont souvent limité l'accès des filles à l'éducation. Elle a contribué à augmenter le taux de scolarisation des filles, leur offrant la possibilité de mieux s'intégrer dans le monde du travail et de participer à des rôles de leadership dans la société."
    ],
    "Loi sur l'éducation gratuite et obligatoire" => [
        "pays" => "Inde",
        "date" => "1976",
        "description" => "En 1976, l'Inde a adopté une réforme constitutionnelle qui a rendu l'éducation gratuite et obligatoire pour tous les enfants âgés de 6 à 14 ans. Cette loi, bien que tardive par rapport à certains autres pays, a été un moment marquant pour améliorer l'accès à l'éducation pour les filles, en particulier dans les zones rurales et marginalisées.",
        "impact" => "La loi a été cruciale pour les filles en Inde, car elle a permis une plus grande scolarisation des filles issues de familles défavorisées. L'éducation gratuite et obligatoire a permis à de nombreuses filles d'échapper à des mariages précoces et de participer à la construction d'une société plus égalitaire. Cependant, des défis subsistent, notamment en termes d'infrastructure et de mise en œuvre, surtout dans les zones rurales."
    ],
    "Loi sur l’égalité d’accès à l’éducation (Title IX)" => [
        "pays" => "États-Unis",
        "date" => "1972",
        "description" => "Le Title IX est une loi fédérale des États-Unis qui interdit la discrimination fondée sur le sexe dans tous les programmes d'éducation ou d'activités scolaires financés par le gouvernement fédéral. Bien que principalement connue pour son impact dans le domaine du sport féminin, cette loi a eu un impact beaucoup plus large, garantissant l'accès des femmes et des filles à des programmes éducatifs sans discrimination.",
        "impact" => "Title IX a été une avancée majeure pour les droits des femmes dans l'éducation. Elle a permis aux filles d'accéder à des programmes académiques et sportifs sur un pied d'égalité avec les garçons. Cela a permis de créer un environnement plus équitable pour les femmes dans les universités et écoles, ouvrant des possibilités dans des domaines tels que les sciences, la technologie, l'ingénierie et les mathématiques (STEM), où elles étaient historiquement sous-représentées."
    ],
    "Loi sur l'accès universel à l'éducation primaire" => [
        "pays" => "Afrique du Sud",
        "date" => "1994",
        "description" => "Avec la fin de l'apartheid en 1994, l'Afrique du Sud a introduit des réformes profondes dans le système éducatif, y compris la loi garantissant l'accès universel à l'éducation primaire. Cette loi vise à éliminer les inégalités raciales et de genre dans l'éducation et à garantir un accès égal à l'éducation pour tous les enfants, quel que soit leur sexe ou leur origine ethnique.",
        "impact" => "En assurant un accès universel à l'éducation primaire, cette loi a permis aux filles sud-africaines d'accéder à une éducation gratuite et de qualité. Cela a eu un impact significatif sur l'émancipation des femmes en Afrique du Sud, leur donnant les outils nécessaires pour réussir dans des domaines jusque-là dominés par les hommes. La loi a également contribué à une réduction de l'écart entre les sexes dans les taux de scolarisation."
    ],
    "Loi pour l'accès égalitaire à l’éducation des filles" => [
        "pays" => "Pakistan",
        "date" => "2003",
        "description" => "Cette loi a été introduite pour garantir un accès égalitaire à l'éducation pour les filles au Pakistan, où la scolarisation des filles est traditionnellement faible, en particulier dans les régions rurales. La loi a mis en place des programmes de sensibilisation pour encourager les parents à envoyer leurs filles à l'école et a fourni des fonds pour l'amélioration des infrastructures scolaires.",
        "impact" => "La loi a été un pas important vers la réduction des inégalités entre les sexes dans l'éducation au Pakistan. En offrant aux filles un accès égal à l'éducation, elle a renforcé leur autonomie et leur capacité à prendre des décisions éclairées. Cependant, de nombreux défis demeurent, notamment la résistance culturelle et les obstacles économiques qui limitent encore l'accès à l'éducation pour les filles dans certaines régions."
    ],
    "Loi sur l'éducation inclusive pour les filles handicapées" => [
        "pays" => "Rwanda",
        "date" => "2010",
        "description" => "Cette loi vise à intégrer les filles handicapées dans le système éducatif rwandais, en assurant qu'elles bénéficient d'une éducation inclusive. L’objectif principal est de garantir à chaque enfant, indépendamment de son statut physique, l'accès à une éducation de qualité, ce qui inclut la création de programmes d'éducation adaptés aux besoins des filles handicapées.",
        "impact" => "Cette législation a été un grand pas vers l'égalité des chances pour les filles handicapées, un groupe souvent marginalisé dans les sociétés en développement. En offrant une éducation inclusive, cette loi permet à ces filles d'acquérir les compétences nécessaires pour améliorer leur autonomie et leur participation active à la société. Cela reflète également un changement de mentalité dans la manière dont les femmes et les filles handicapées sont perçues et traitées."
    ],
    "Loi sur la scolarisation obligatoire des filles" => [
        "pays" => "Maroc",
        "date" => "2006",
        "description" => "Le Maroc a introduit en 2006 une loi visant à rendre la scolarisation obligatoire pour les filles, une initiative qui faisait partie d'une série de réformes pour lutter contre l'analphabétisme et promouvoir l'égalité des sexes dans le pays. La loi stipule que l'éducation primaire et secondaire doit être accessible à tous les enfants, avec des mesures spécifiques pour encourager l'inscription des filles.",
        "impact" => "Cette loi a eu un impact significatif en augmentant le taux de scolarisation des filles, particulièrement dans les zones rurales où les filles étaient souvent privées d'accès à l'éducation. Elle a permis de sensibiliser davantage les familles sur l'importance de l'éducation des filles, contribuant ainsi à leur émancipation. Cela a aussi favorisé une participation plus équitable des femmes dans la vie économique et politique du pays."
    ],
    "Loi organique n° 2002-80 sur l'égalité entre les sexes et la lutte contre la discrimination" => [
        "pays" => "Tunisie",
        "date" => "2002",
        "description" => "Cette loi a été mise en place pour promouvoir l'égalité entre les sexes en Tunisie, en abordant la discrimination dans les domaines de l'éducation, du travail et des droits civils. Elle fait partie d'un effort plus large pour garantir que les femmes aient accès aux mêmes opportunités que les hommes dans tous les domaines de la vie publique et privée.",
        "impact" => "La loi a été un tournant pour les droits des femmes en Tunisie, offrant une protection légale contre les discriminations fondées sur le sexe. Elle a joué un rôle essentiel dans l'amélioration de l'accès des femmes à l'éducation, en offrant des mesures spécifiques pour lutter contre les stéréotypes de genre dans les établissements scolaires. Ce type de législation contribue à construire une société plus égalitaire et plus juste pour les femmes."
    ],
    "Objectif d’éducation universelle – Programme Éducation pour Tous (UNESCO)" => [
        "pays" => "International (soutenu par l'UNESCO)",
        "date" => "1990",
        "description" => "Lancé en 1990 par l'UNESCO, le programme 'Éducation pour Tous' vise à garantir que tous les enfants, sans distinction de sexe, de situation économique ou de handicap, puissent accéder à une éducation de qualité. Le programme met l'accent sur l'éducation des filles, en reconnaissant que l'égalité d'accès à l'éducation est cruciale pour le développement des sociétés.",
        "impact" => "Le programme a donné un coup de pouce majeur à la scolarisation des filles dans de nombreux pays en développement, en particulier en Afrique et en Asie, où les filles sont souvent exclues de l'éducation formelle en raison de discriminations culturelles et économiques. Il a permis de sensibiliser les gouvernements et les organisations internationales à l'importance de donner aux filles un accès égal à l'éducation, un facteur clé pour améliorer la condition des femmes dans le monde entier."
    ],
    "Loi sur la gratuité de l’enseignement secondaire pour les filles" => [
        "pays" => "Sierra Leone",
        "date" => "2015",
        "description" => "En 2015, la Sierra Leone a adopté une loi rendant l'enseignement secondaire gratuit pour les filles. Cette législation a été instaurée dans un contexte où les filles étaient souvent désavantagées en matière d'accès à l'éducation, en partie à cause des coûts et de la perception selon laquelle les filles ne devraient pas poursuivre des études longues.",
        "impact" => "Cette loi a été un grand pas pour les droits des femmes et des filles en Sierra Leone, permettant à un plus grand nombre de filles de poursuivre leurs études et de bénéficier d'une éducation secondaire de qualité. L'impact a été particulièrement important dans les zones rurales où les filles avaient traditionnellement moins d'opportunités. En ouvrant les portes de l'éducation secondaire, cette loi a renforcé l'autonomie des filles et leur a donné les moyens de transformer leur avenir."
    ],
    "Loi sur la répression du viol" => [
        "pays" => "France",
        "date" => "1980",
        "description" => "En 1980, la France a adopté une loi définissant plus clairement le viol et augmentant les peines encourues pour ce crime. La loi a modifié le Code pénal en introduisant une nouvelle définition légale du viol, le distinguant d'autres types de violences sexuelles. Avant cette loi, le viol n'était pas toujours reconnu comme un crime grave. Cette législation a permis d’officialiser la notion de consentement, en considérant que toute pénétration sexuelle sans consentement est un viol.",
        "impact" => "Cette loi a été un tournant dans la reconnaissance légale du viol comme un crime grave, impliquant des sanctions plus sévères pour les agresseurs. Elle a marqué une étape importante dans la lutte contre les violences sexuelles et a sensibilisé l'opinion publique à l'importance du consentement. Bien qu'il reste encore des progrès à faire, cette législation a permis de placer le viol au centre des préoccupations juridiques et sociales en matière de violences sexistes et sexuelles."
    ],
    "Criminalisation du viol conjugal" => [
        "pays" => "Canada",
        "date" => "1993",
        "description" => "En 1993, le Canada a modifié son Code criminel pour inclure le viol conjugal comme un crime distinct. Avant cette loi, les actes de violence sexuelle au sein du mariage n'étaient pas considérés comme des crimes, en raison de la notion de 'consentement présumé' dans le cadre du mariage. Cette loi a été une avancée importante, car elle a reconnu que le mariage ne donnait pas de droits sexuels sur l'autre partenaire.",
        "impact" => "Cette loi a eu un impact significatif sur les droits des femmes, en particulier en ce qui concerne la reconnaissance de leurs droits à une sexualité sans coercition, même au sein du mariage. Elle a été un tournant majeur dans la lutte contre les violences conjugales, car elle a permis de reconnaître officiellement que le viol n'a pas de frontières, même dans les relations maritales."
    ],
    "Loi contre la violence domestique (Violence Against Women Act)" => [
        "pays" => "États-Unis",
        "date" => "1994",
        "description" => "La Violence Against Women Act (VAWA) a été signée par le président Bill Clinton en 1994. Elle vise à protéger les femmes contre la violence domestique, les agressions sexuelles, le harcèlement, ainsi qu’à offrir un soutien aux victimes de violence. La loi a facilité l'accès à la justice pour les femmes, en garantissant des services d'assistance aux victimes, tels que des refuges, des conseils juridiques, et des fonds pour les forces de l'ordre pour mieux traiter ces affaires.",
        "impact" => "Cette loi a été un tournant majeur dans la protection des femmes contre la violence domestique aux États-Unis. Elle a permis de renforcer les structures légales de soutien aux victimes et a facilité les poursuites contre les auteurs de violence. La VAWA a également sensibilisé le public à la violence domestique en tant que problème social majeur, pas uniquement une question privée, mais une violation des droits humains."
    ],
    "Loi de lutte contre les violences conjugales - Espagne" => [
        "pays" => "Espagne",
        "date" => "2005",
        "description" => "La loi espagnole de lutte contre les violences conjugales, adoptée en 2005, vise à lutter contre les violences domestiques, en particulier la violence conjugale, en instaurant des mesures de prévention et en renforçant la protection des victimes. La loi a introduit de nouvelles sanctions pour les violences conjugales, a facilité l'accès des victimes à la justice et a établi des programmes pour les aider à se reconstruire après des violences.",
        "impact" => "Cette législation a eu un effet majeur dans la lutte contre les violences faites aux femmes en Espagne, en renforçant la protection des victimes et en établissant des mécanismes pour prévenir et punir les violences conjugales. L'impact de cette loi a contribué à une prise de conscience accrue dans la société espagnole sur l'ampleur du problème et a facilité l'accès des femmes à la justice et à l'assistance."
    ],
    "Criminalisation des mutilations génitales féminines (MGF)" => [
        "pays" => "Kenya",
        "date" => "2003",
        "description" => "La loi kenyane de 2003 a interdit les mutilations génitales féminines (MGF), une pratique profondément enracinée dans certaines cultures africaines, et qui a de graves conséquences pour la santé et les droits des femmes. Cette loi a introduit des sanctions sévères contre les personnes pratiquant les MGF, et a mis en place des campagnes de sensibilisation pour éradiquer cette pratique.",
        "impact" => "Cette législation a été cruciale pour la santé et les droits des femmes au Kenya. Elle a contribué à l'émancipation des femmes en interdisant une pratique dangereuse et humiliante, tout en encourageant un changement culturel nécessaire pour protéger les droits fondamentaux des filles et des femmes. Bien que des efforts soient encore nécessaires pour éradiquer complètement les MGF, la loi a été un pas important vers la reconnaissance du droit des femmes à leur intégrité physique."
    ],
    "Loi sur les féminicides – reconnaissance légale du terme" => [
        "pays" => "Mexique",
        "date" => "2012",
        "description" => "Le Mexique a adopté en 2012 une loi permettant de reconnaître le féminicide, qui est le meurtre d’une femme en raison de son sexe, comme un crime spécifique. Cette loi permet de classifier les meurtres de femmes comme des féminicides, facilitant ainsi les poursuites contre les auteurs de ces meurtres. Elle comprend également des mesures pour protéger les femmes de la violence et améliorer les enquêtes sur les meurtres de femmes.",
        "impact" => "Cette loi a été une avancée importante dans la lutte contre la violence de genre au Mexique. Le terme féminicide a permis de mieux comprendre l’ampleur du problème et d'apporter des solutions plus ciblées. La loi a également permis de renforcer la réponse de l'État face aux meurtres violents de femmes, qui étaient souvent ignorés ou mal traités par les autorités. En consacrant le féminicide comme un crime spécifique, cette législation met l'accent sur la violence systémique contre les femmes."
    ],
    "Loi n° 103-13 sur la lutte contre les violences faites aux femmes" => [
        "pays" => "Maroc",
        "date" => "2018",
        "description" => "La loi marocaine sur la lutte contre les violences faites aux femmes, adoptée en 2018, a marqué un tournant important dans la reconnaissance des violences sexistes dans le pays. Elle établit des sanctions pénales pour les violences domestiques, y compris le harcèlement sexuel, l'agression physique et le viol. Elle met en place des mécanismes juridiques permettant aux victimes de dénoncer plus facilement les abus et offre également une protection juridique aux femmes victimes de violence. Parmi ses principales dispositions, la loi prévoit des peines plus sévères pour les auteurs de violence domestique et crée des cellules d’écoute et de soutien pour les femmes victimes.",
        "impact" => "Cette loi représente un progrès significatif dans la lutte contre les violences faites aux femmes au Maroc, bien qu'elle ait suscité des débats sur sa portée et son efficacité dans la pratique. Elle permet de mieux protéger les femmes contre les violences domestiques et sexuelles et favorise leur accès à la justice. Cependant, la mise en œuvre effective de cette loi reste un défi, notamment dans les zones rurales où les mentalités sont parfois réticentes à accepter de telles réformes."
    ],
    "Loi sur la protection contre les violences sexuelles et domestiques" => [
        "pays" => "Inde",
        "date" => "2010",
        "description" => "La loi indienne de 2010 sur la protection contre les violences domestiques a été une réponse directe aux problèmes croissants de violences faites aux femmes dans le pays. Cette législation offre une protection légale aux femmes victimes de violences physiques, sexuelles, émotionnelles ou économiques au sein du foyer. Elle permet aux victimes de déposer des plaintes et de bénéficier d'ordonnances de protection, de soutien psychologique et d'un accès aux services de santé. Elle a été renforcée après le cas très médiatisé du viol collectif de Delhi en 2012.",
        "impact" => "Cette loi a permis de mieux protéger les femmes contre les violences domestiques et de reconnaître la violence conjugale comme un crime grave. Elle a été un pas important dans la reconnaissance des droits des femmes à vivre sans violence, mais la mise en œuvre reste inégale dans un pays aussi vaste et diversifié. L'une des grandes difficultés reste la persistance des stéréotypes sexistes et la lenteur du système judiciaire à traiter ces affaires efficacement."
    ],
    "Loi contre les violences sexuelles dans les conflits armés – résolution 1820" => [
        "pays" => "International (ONU)",
        "date" => "2008",
        "description" => "La résolution 1820 adoptée par l'ONU en 2008 vise à lutter contre l'utilisation des violences sexuelles comme arme de guerre dans les conflits armés. Cette résolution appelle à l'adoption de mesures visant à prévenir l'utilisation de la violence sexuelle dans les conflits et à tenir les auteurs responsables. Elle considère les violences sexuelles comme une menace pour la paix et la sécurité internationales et appelle les États à poursuivre les coupables devant la justice.",
        "impact" => "Cette résolution est d'une importance capitale pour les droits des femmes dans les situations de guerre et de conflit, où les violences sexuelles sont souvent utilisées comme un moyen de domination. En plaçant la violence sexuelle au cœur des préoccupations de sécurité internationale, elle permet de sensibiliser davantage la communauté internationale à la souffrance des femmes dans les conflits armés et encourage une réponse globale pour protéger leurs droits fondamentaux."
    ],
    "Loi sur la pénalisation du harcèlement de rue" => [
        "pays" => "France",
        "date" => "2018",
        "description" => "La France a introduit la loi contre le harcèlement de rue en 2018, afin de lutter contre le harcèlement sexuel dans l'espace public. Cette loi pénalise les comportements de harcèlement sexuel dans la rue, qu'il s'agisse de commentaires, de gestes, de sifflements ou de tout autre type de comportement visant à importer une personne en raison de son sexe. Les auteurs de harcèlement peuvent se voir infliger une amende et, dans certains cas, des peines de prison.",
        "impact" => "Cette loi est un outil important pour la protection des femmes contre l'insécurité dans l'espace public. Elle est perçue comme une avancée dans la lutte contre le sexisme et le harcèlement sexuel, offrant aux femmes une législation spécifique pour les protéger dans des situations courantes où elles se sentent vulnérables. Bien que la mise en œuvre de la loi reste un défi, elle envoie un message clair sur la volonté de la société de traiter le harcèlement de rue comme une forme de violence sexiste et d'agression."
    ],
    "Loi sur la définition du viol basée sur le consentement" => [
        "pays" => "Suède",
        "date" => "2022",
        "description" => "En 2022, la Suède a adopté une législation qui définit le viol sur la base du consentement explicite. Contrairement à la définition antérieure du viol, qui se concentrait sur la violence ou la contrainte physique, cette loi stipule que le viol est défini par l'absence de consentement. Cela signifie que si une personne ne donne pas son consentement clair et explicite à une relation sexuelle, il s'agit d'un viol, même sans la présence de force physique.",
        "impact" => "Cette loi constitue une avancée majeure dans la reconnaissance des droits des femmes en matière de sexualité et de consentement. Elle place la responsabilité sur l'auteur du viol de prouver que le consentement a été donné, plutôt que sur la victime de prouver qu'elle a résisté. Cela permet de mieux protéger les femmes contre les agressions sexuelles et de rétablir un équilibre de pouvoir dans les relations sexuelles. C'est une avancée significative vers une reconnaissance complète des droits des femmes à disposer librement de leur corps."
    ],
    "Loi sur la reconnaissance du viol comme crime de guerre" => [
        "pays" => "International (Cour pénale internationale – CPI)",
        "date" => "1998",
        "description" => "Le Statut de Rome de 1998, qui a établi la Cour pénale internationale (CPI), a reconnu le viol comme un crime de guerre. Cette législation internationale a permis de classifier les violences sexuelles commises dans le cadre de conflits armés, y compris le viol, comme des violations des droits humains et du droit international humanitaire. Cette reconnaissance permet aux auteurs de ces crimes d'être poursuivis par la CPI, même s'ils ne sont pas jugés dans le pays où les crimes ont été commis.",
        "impact" => "La reconnaissance du viol comme crime de guerre est une avancée importante pour les droits des femmes, car elle garantit que les violences sexuelles, souvent utilisées comme armes de guerre, seront poursuivies au niveau international. Cela envoie un message fort sur l'importance de protéger les femmes dans les situations de guerre et de conflit, en reconnaissant leur souffrance et en les élevant au rang de victimes de crimes de guerre."
    ],
    "Abolition de l’autorité maritale – femmes égales dans le couple" => [
        "pays" => "France",
        "date" => "1938",
        "description" => "Avant 1938, les femmes mariées en France étaient sous l'autorité légale de leur mari, ce qui signifiait qu’elles ne pouvaient pas gérer leurs biens, ouvrir un compte en banque ou même travailler sans l'accord de leur époux. Cette loi de 1938 a aboli cette autorité maritale et a reconnu l'égalité des époux dans le mariage, ce qui a permis aux femmes de disposer de leurs biens et d’exercer leurs droits civils de manière indépendante.",
        "impact" => "Cette loi a été une étape cruciale dans la lutte pour les droits des femmes en France, car elle a permis aux femmes de gagner une forme d'autonomie et de reconnaissance juridique dans le cadre du mariage. Elle a également favorisé la reconnaissance du rôle égalitaire des femmes au sein du couple, ce qui a contribué à l'émancipation des femmes et a pavé la voie à d'autres réformes visant à réduire les inégalités entre les sexes."
    ],
    "Loi sur le mariage civil obligatoire" => [
        "pays" => "Italie",
        "date" => "1969",
        "description" => "Avant 1969, en Italie, le mariage religieux était prédominant et les femmes mariées étaient soumises à des normes religieuses strictes. Cette loi a établi le mariage civil comme obligatoire, marquant ainsi une distinction importante entre le mariage religieux et civil. Elle a permis à chaque individu de se marier légalement sans nécessiter la bénédiction de l'Église.",
        "impact" => "La loi de 1969 a facilité l'accès des femmes à l'égalité matrimoniale en leur permettant de choisir librement le cadre légal dans lequel elles se marieraient, indépendamment de l’influence de l’Église. Cela a contribué à une plus grande autonomie juridique pour les femmes, en leur offrant un cadre plus laïque et égalitaire pour leurs droits dans le mariage."
    ],
    "Loi autorisant le divorce par consentement mutuel" => [
        "pays" => "France",
        "date" => "1975",
        "description" => "Avant 1975, le divorce en France était très difficile à obtenir et nécessitait des causes légales spécifiques comme l’adultère ou la maltraitance. Cette loi a introduit le divorce par consentement mutuel, permettant aux deux époux de divorcer d'un commun accord, sans avoir à justifier une cause particulière. Cela a facilité le processus pour les femmes, en particulier celles qui se retrouvaient dans des mariages abusifs ou malheureux.",
        "impact" => "Cette loi a renforcé les droits des femmes en matière de divorce, en leur offrant un processus plus équitable et moins stigmatisant. Elle a permis aux femmes de se libérer de mariages non désirés plus facilement, avec des procédures moins traumatisantes. Cela a également contribué à affirmer l'idée de l'égalité entre les sexes dans la prise de décisions matrimoniales."
    ],
    "Loi sur l’abaissement de la majorité matrimoniale des femmes à 18 ans" => [
        "pays" => "France",
        "date" => "1974",
        "description" => "Avant 1974, la majorité matrimoniale pour les femmes en France était de 21 ans, tandis que pour les hommes, elle était de 18 ans. Cette loi a permis d'abaisser la majorité matrimoniale des femmes à 18 ans, les alignant ainsi sur celle des hommes. Cela a donné aux femmes la possibilité de se marier et de prendre des décisions légales concernant le mariage dès leur majorité.",
        "impact" => "Cette réforme a renforcé l’égalité entre les sexes en matière de droits civils et matrimoniaux. Elle a permis de donner aux femmes une reconnaissance juridique en tant qu'adultes capables de prendre leurs propres décisions, en particulier en matière de mariage, tout en assurant une égalité des droits avec les hommes dans ce domaine."
    ],
    "Loi sur l’égalité des époux dans le mariage" => [
        "pays" => "Allemagne",
        "date" => "1981",
        "description" => "La loi allemande de 1981 a permis l'égalité totale entre les époux dans le cadre du mariage. Elle stipule que les deux partenaires ont les mêmes droits et obligations, incluant la répartition des responsabilités domestiques et professionnelles. Cette législation visait à mettre fin à l'idée selon laquelle l'homme était le chef de famille, en garantissant l'égalité de traitement dans la gestion du foyer et des enfants.",
        "impact" => "Cette loi a été fondamentale dans le processus d'émancipation des femmes en Allemagne, en leur assurant des droits égaux dans le mariage, notamment en matière de choix de carrière, de parentalité et de gestion des finances familiales. Elle a permis de favoriser un modèle de mariage plus égalitaire, où les femmes ne sont plus confinées à des rôles subordonnés au sein du foyer."
    ],
    "Loi sur la reconnaissance du viol conjugal" => [
        "pays" => "Afrique du Sud",
        "date" => "1993",
        "description" => "La loi sud-africaine de 1993 a permis la reconnaissance légale du viol conjugal, c'est-à-dire qu'un mari peut désormais être poursuivi pour viol si sa femme refuse d'avoir des relations sexuelles. Avant cette loi, le viol conjugal n'était pas reconnu en droit, car l'on supposait qu'une femme était toujours consentante au sein du mariage.",
        "impact" => "La reconnaissance du viol conjugal en Afrique du Sud a été un tournant majeur dans la lutte contre les violences domestiques, en particulier celles exercées au sein du mariage. Cela a donné aux femmes une protection juridique contre l’abus de pouvoir de leur conjoint, en reconnaissant leur droit à l’autonomie corporelle et à la protection contre les agressions sexuelles, même dans le cadre marital."
    ],
    "Legalisation du mariage homosexuel" => [
        "pays" => "Pays-Bas",
        "date" => "2001",
        "description" => "En 2001, les Pays-Bas ont été le premier pays à légaliser le mariage homosexuel, permettant ainsi aux couples de même sexe d'avoir les mêmes droits que les couples hétérosexuels. Cela incluait la possibilité d’adopter des enfants, de partager des biens et d'hériter l'un de l'autre.",
        "impact" => "Bien que cette loi concerne principalement les droits des personnes LGBTQ+, elle a également eu un impact significatif sur les droits des femmes, en particulier les femmes lesbiennes. Elle a permis à ces dernières de se marier légalement et de bénéficier des mêmes droits que les couples hétérosexuels, renforçant ainsi l'égalité des droits dans le cadre familial."
    ],
    "Loi sur la garde partagée équitable après divorce" => [
        "pays" => "Canada",
        "date" => "2006",
        "description" => "La loi canadienne de 2006 a introduit des mesures pour encourager la garde partagée des enfants après un divorce. Cette législation stipule que, dans la mesure du possible, les deux parents doivent avoir une part égale de responsabilité dans l'éducation et la prise en charge des enfants, au lieu que l'un des parents (souvent la mère) soit seul responsable. La loi vise à protéger les droits des enfants en assurant qu'ils maintiennent des relations équilibrées avec les deux parents.",
        "impact" => "La loi a un impact positif sur les femmes, car elle aide à contrer les stéréotypes selon lesquels les mères sont toujours les meilleures gardiennes des enfants. Elle permet aux femmes de partager plus équitablement les responsabilités parentales, ce qui est essentiel pour réduire les inégalités de genre. De plus, elle aide les mères à maintenir un équilibre entre leur carrière et leurs obligations familiales, en évitant une surcharge de travail parental qui est souvent associée à la garde exclusive."
    ],
    "Loi sur l’interdiction du mariage des enfants" => [
        "pays" => "Éthiopie",
        "date" => "2006",
        "description" => "En 2006, l’Éthiopie a adopté une loi interdisant le mariage des enfants, fixant l'âge légal du mariage à 18 ans. Cette loi vise à lutter contre les mariages précoces, qui sont particulièrement fréquents dans les zones rurales et ont de graves conséquences sur la santé et les droits des filles. Le mariage précoce est une forme de violence sexuelle et domestique et limite gravement les perspectives d'éducation et d'autonomisation des filles.",
        "impact" => "Cette loi est un important progrès pour les droits des femmes en Éthiopie, en protégeant les filles contre les mariages forcés et en leur donnant plus de temps pour poursuivre leur éducation et leur développement personnel. Elle contribue également à réduire les risques liés à la grossesse précoce et à offrir aux filles la possibilité de prendre des décisions sur leur propre vie et leur avenir."
    ],
    "Loi Taubira – mariage pour tous" => [
        "pays" => "France",
        "date" => "2013",
        "description" => "La loi Taubira, adoptée en 2013 en France, a permis la légalisation du mariage entre personnes de même sexe, offrant ainsi aux couples homosexuels les mêmes droits que les couples hétérosexuels en matière de mariage, d’adoption et de succession. Cette loi a été un tournant majeur pour l’égalité des droits en France, en donnant aux couples homosexuels un accès légal au mariage.",
        "impact" => "Bien que cette loi soit principalement axée sur les droits des personnes LGBTQ+, elle a également un impact positif sur les femmes, en particulier les lesbiennes. La légalisation du mariage pour tous a permis aux femmes lesbiennes de se marier et de bénéficier des mêmes droits que les couples hétérosexuels, renforçant ainsi les principes d'égalité et de non-discrimination."
    ],
    "Loi sur le congé parental partagé" => [
        "pays" => "Suède",
        "date" => "2010",
        "description" => "La Suède a introduit en 2010 un congé parental partagé, permettant aux deux parents de partager le congé parental de manière flexible. La loi favorise l'égalité des sexes en encourageant les pères à prendre un congé parental afin de réduire les inégalités entre hommes et femmes dans le monde du travail. Le congé parental est payé à un taux élevé et peut être réparti entre les deux parents, avec une incitation financière à ce que les deux parents en bénéficient équitablement.",
        "impact" => "Ce congé parental partagé est crucial pour les femmes, car il permet de lutter contre les discriminations liées à la maternité et les inégalités salariales entre hommes et femmes. Il permet aux mères de retourner plus facilement au travail tout en assurant une répartition équitable des responsabilités parentales. En encourageant les pères à prendre part à l’éducation des enfants, la loi soutient également l'idée d'un équilibre familial et d'une co-parentalité égalitaire."
    ],
    "Loi sur la reconnaissance de la parentalité pour les couples de même sexe" => [
        "pays" => "Irlande",
        "date" => "2015",
        "description" => "En 2015, l'Irlande a légalisé le mariage pour les couples de même sexe et a introduit une loi garantissant aux couples homosexuels la reconnaissance légale de leur parentalité. Cette loi a permis aux couples de même sexe d'adopter des enfants et d'être légalement reconnus comme parents. Elle a élargi les droits parentaux et a permis de garantir que les deux partenaires d'un couple de même sexe aient des droits égaux en matière de parentalité.",
        "impact" => "Bien que cette loi soit centrée sur les couples homosexuels, elle a également un impact positif pour les femmes lesbiennes qui, grâce à cette législation, peuvent légalement devenir mères et bénéficier de la reconnaissance de leurs droits parentaux. Cette loi renforce l'égalité des genres dans le cadre familial et démontre l'importance de l'inclusivité dans les législations familiales."
    ],
    "Loi interdisant la polygamie" => [
        "pays" => "Tunisie",
        "date" => "1965",
        "description" => "La Tunisie a été l'un des premiers pays arabes à interdire la polygamie en 1965. Cette loi stipule que la polygamie est illégale et interdit à un homme d'avoir plusieurs épouses. Elle a été mise en place dans le cadre des réformes progressistes du Code du statut personnel tunisien, qui visait à moderniser le pays et à garantir des droits égaux pour les femmes dans le mariage et la famille.",
        "impact" => "L'interdiction de la polygamie en Tunisie a permis de renforcer les droits des femmes et de garantir une égalité plus grande dans les relations conjugales. En mettant fin à la pratique de la polygamie, la loi a permis de protéger les femmes contre l'injustice et la discrimination au sein de la famille, en donnant à chaque femme une reconnaissance égale dans le mariage."
    ],
    "Loi sur la PMA pour toutes les femmes" => [
        "pays" => "France",
        "date" => "2021",
        "description" => "La loi sur la PMA (procréation médicalement assistée) pour toutes les femmes a été adoptée en France en 2021, permettant aux femmes célibataires et aux couples de femmes d'accéder à la PMA. Avant cette loi, l'accès à la PMA était réservé aux couples hétérosexuels. La loi a été un pas important pour l'égalité des droits des femmes et pour les droits des couples homosexuels.",
        "impact" => "Cette loi a permis aux femmes lesbiennes et célibataires d'accéder aux mêmes droits reproductifs que les couples hétérosexuels. Elle soutient l'autonomie des femmes dans leur choix de devenir mères, en élargissant l'accès à des techniques médicales qui permettent de fonder une famille. Cela marque une avancée dans la lutte pour l'égalité des droits reproductifs pour toutes les femmes."
    ],
    "Loi sur l’interdiction du mariage forcé" => [
        "pays" => "Royaume-Uni",
        "date" => "2014",
        "description" => "La loi britannique de 2014 interdit les mariages forcés, en criminalisant les personnes qui forcent un individu à se marier contre son gré. La loi permet également aux victimes de mariage forcé de demander une protection juridique, comme une ordonnance de protection, pour empêcher le mariage ou sa réalisation.",
        "impact" => "Cette loi est une avancée majeure pour les droits des femmes, car elle leur permet de se protéger contre une pratique abusive et violente qui touche de nombreuses jeunes filles et femmes à travers le monde. En interdisant le mariage forcé, la loi protège les femmes de l'exploitation et leur permet de faire des choix libres et éclairés sur leur avenir."
    ],
    "Droit d’éligibilité des femmes au Parlement" => [
        "pays" => "Royaume-Uni",
        "date" => "1918",
        "description" => "Le Parlement britannique a adopté cette loi en 1918, autorisant les femmes à se présenter aux élections parlementaires. Avant cette loi, les femmes étaient exclues de l'éligibilité politique, bien qu'elles aient pu être élues au Parlement. Ce droit a été accordé à l'issue des luttes menées par les suffragettes, qui réclamaient l’égalité des droits politiques et la fin de la discrimination envers les femmes dans le domaine politique.",
        "impact" => "L’accès des femmes à l’éligibilité au Parlement a été une étape importante vers l’égalité des sexes en politique. Il a permis d’élargir la participation des femmes dans le processus décisionnel, créant ainsi un précédent pour d'autres pays cherchant à promouvoir l'inclusion des femmes en politique. La loi a permis de briser les barrières de genre dans les espaces de pouvoir, ouvrant la voie à une représentation accrue des femmes dans les instances législatives."
    ],
    "Premier vote et éligibilité des femmes à l’échelle fédérale" => [
        "pays" => "Canada",
        "date" => "1919",
        "description" => "Le Canada a accordé le droit de vote aux femmes en 1918 pour les élections fédérales, et en 1919, les femmes ont été rendues éligibles pour se présenter à des élections fédérales. La loi a été un pas décisif dans le processus de reconnaissance de l'égalité des droits entre hommes et femmes, en particulier après des années de lutte par les suffragistes.",
        "impact" => "L'introduction de ce droit a permis aux femmes de participer activement à la politique canadienne. Elle a été essentielle pour faire progresser la représentation des femmes dans la sphère publique et a jeté les bases de l'égalité des genres au Canada. En permettant aux femmes de se présenter à des fonctions politiques, cette loi a ouvert de nouvelles possibilités de leadership pour les femmes dans la société canadienne."
    ],
    "Loi sur l’éligibilité des femmes aux fonctions politiques" => [
        "pays" => "France",
        "date" => "1945",
        "description" => "La loi de 1945 a permis aux femmes d’accéder pleinement aux fonctions politiques en France, en supprimant les obstacles législatifs qui les empêchaient de se présenter à des élections locales et nationales. Avant cette loi, bien que les femmes aient obtenu le droit de vote en 1944, elles étaient encore exclues de nombreuses fonctions publiques.",
        "impact" => "La loi de 1945 a été une victoire importante pour les droits des femmes, en leur permettant non seulement de voter, mais aussi de jouer un rôle actif dans la politique française. Cette loi a permis à des femmes comme Simone Veil, plus tard présidente du Parlement européen, de briller sur la scène politique, ouvrant des voies pour d’autres femmes en politique et en leadership."
    ],
    "Constitution de l’Inde – garantie de représentation des femmes dans les Panchayats (conseils locaux)" => [
        "pays" => "Inde",
        "date" => "1950",
        "description" => "La Constitution de l'Inde de 1950 a établi les bases d'un système démocratique incluant des mécanismes de représentation au niveau local via les Panchayats, les conseils locaux. En 1993, un amendement a été introduit, garantissant une représentation minimale de 33 % de femmes dans ces instances locales. Cette réforme a permis aux femmes de participer activement à la gouvernance locale.",
        "impact" => "Ce mécanisme a donné aux femmes une voix dans les affaires locales, leur permettant de jouer un rôle actif dans la gestion des ressources et la prise de décisions sur des questions essentielles comme l'éducation et la santé. Bien que des défis subsistent, la loi a été un tournant, améliorant la représentation des femmes dans les affaires publiques locales et ouvrant la voie à davantage de femmes dans les sphères politiques et administratives."
    ],
    "Loi de quota de 30 % de femmes au Parlement" => [
        "pays" => "Afrique du Sud",
        "date" => "1997",
        "description" => "Après la fin de l'apartheid, l'Afrique du Sud a adopté des lois visant à promouvoir l'égalité de genre. La loi de 1997 a introduit un quota de 30 % de femmes dans les représentations politiques, y compris au Parlement. Cette mesure visait à réduire les déséquilibres historiques qui excluaient les femmes des sphères de pouvoir.",
        "impact" => "Le quota de 30 % a permis de renforcer la présence des femmes dans les instances décisionnelles et a fait de l'Afrique du Sud un modèle en matière de parité en politique. Cela a offert aux femmes une meilleure représentation dans la législation et les décisions nationales, renforçant leur influence et contribuant à l'égalisation des opportunités politiques."
    ],
    "Loi sur la parité hommes-femmes en politique" => [
        "pays" => "France",
        "date" => "2000",
        "description" => "La loi du 6 juin 2000 en France impose aux partis politiques de présenter un nombre égal d’hommes et de femmes sur leurs listes électorales pour les élections législatives et municipales. Ce dispositif visait à mettre fin à la sous-représentation des femmes dans la vie politique.",
        "impact" => "Cette loi a joué un rôle clé dans l'augmentation du nombre de femmes élues en France, favorisant ainsi une plus grande égalité entre les sexes dans les institutions politiques. Elle a été saluée comme une avancée majeure dans la lutte pour l'égalité des droits politiques. Toutefois, des critiques persistent, certains estimant que la parité ne résout pas entièrement les problèmes de représentation et d'influence des femmes en politique."
    ],
    "Loi sur la représentation politique équitable" => [
        "pays" => "Rwanda",
        "date" => "2006",
        "description" => "En 2006, le Rwanda a adopté une législation garantissant la représentation des femmes dans les institutions politiques. Cette loi prévoit un minimum de 30 % de femmes dans les organes politiques, dont le parlement et les conseils locaux. Le Rwanda est devenu un modèle mondial pour l'inclusion des femmes en politique, avec des progrès significatifs dans la représentation féminine.",
        "impact" => "La loi a permis aux femmes de jouer un rôle majeur dans la reconstruction post-génocide du Rwanda. Grâce à cette législation, le Rwanda a atteint un taux de représentation féminine record au sein de son Parlement, où plus de 60 % des sièges sont occupés par des femmes, ce qui est une avancée majeure pour l'égalité des sexes dans la politique."
    ],
    "Loi sur les quotas de genre pour les partis politiques" => [
        "pays" => "Bolivie",
        "date" => "2009",
        "description" => "La loi bolivienne de 2009 impose aux partis politiques de garantir un minimum de 30 % de femmes sur leurs listes de candidates pour les élections locales et nationales. Cette loi fait partie d'un ensemble de réformes visant à promouvoir l'égalité des sexes dans la politique bolivienne.",
        "impact" => "Cette loi a permis d'augmenter la participation des femmes dans la vie politique de la Bolivie et a conduit à une meilleure représentation des femmes au sein du gouvernement et du parlement. Elle s'inscrit dans un mouvement plus large pour la reconnaissance des droits des femmes et leur place dans les processus décisionnels politiques."
    ],
    "Réforme constitutionnelle – parité obligatoire sur les listes électorales" => [
        "pays" => "Tunisie",
        "date" => "2011",
        "description" => "Suite à la révolution de 2011, la Tunisie a adopté une réforme constitutionnelle garantissant la parité entre hommes et femmes sur les listes électorales. Cette réforme vise à renforcer la représentation des femmes dans la politique tunisienne en imposant que chaque liste électorale contienne un nombre égal d'hommes et de femmes.",
        "impact" => "La réforme a eu un impact significatif sur la politique en Tunisie, favorisant une plus grande participation des femmes aux élections législatives et locales. Cela a permis d'augmenter le nombre de femmes dans les instances décisionnelles et a servi de modèle pour d'autres pays de la région en matière d'égalité des sexes en politique. La loi a été saluée comme un exemple de la promotion de l'égalité de genre dans un contexte post-révolutionnaire."
    ],
    "Loi de quota 50 % femmes dans les fonctions électives" => [
        "pays" => "Mexique",
        "date" => "2019",
        "description" => "La loi de 2019 a instauré un quota de 50 % de femmes sur les listes électorales des partis politiques pour les élections fédérales et locales. Elle vise à remédier à la sous-représentation des femmes dans la politique mexicaine et à assurer une plus grande égalité entre les sexes dans la sphère publique.",
        "impact" => "Cette législation a permis une avancée significative dans la représentation politique des femmes au Mexique, en favorisant leur accès aux postes électifs. Le Mexique a ainsi renforcé la parité homme-femme dans la représentation politique, encourageant une plus grande participation des femmes dans la prise de décision. Ce modèle a été inspirant pour d'autres pays cherchant à renforcer l'égalité des genres en politique."
    ],
    "Directive sur l'équilibre femmes-hommes dans les conseils d'administration" => [
        "pays" => "Union européenne",
        "date" => "2022",
        "description" => "La Directive de l'Union européenne adoptée en 2022 vise à augmenter la représentation des femmes dans les conseils d'administration des entreprises cotées en bourse. Elle impose aux entreprises de garantir qu'au moins 40 % des membres non exécutifs de leurs conseils d'administration soient des femmes d'ici 2026.",
        "impact" => "Cette directive marque un tournant important pour l'égalité des sexes dans les secteurs privés et publics, en particulier en matière de leadership d'entreprise. En favorisant la parité dans les conseils d'administration, la directive renforce la participation des femmes dans des rôles décisionnels de haute importance. Cela constitue une avancée pour les droits des femmes en élargissant leur présence dans des sphères jusque-là dominées par les hommes."
    ],
    "Loi organique n° 59.11 relative à l'élection des membres des conseils des collectivités territoriales" => [
        "pays" => "Maroc",
        "date" => "2011",
        "description" => "La loi organique n° 59.11 adoptée en 2011 au Maroc a été un élément clé de la réforme démocratique, garantissant une représentation des femmes dans les conseils des collectivités territoriales. Elle impose des quotas de femmes sur les listes électorales pour assurer leur présence dans les instances locales de gouvernance.",
        "impact" => "Cette législation a ouvert la voie à une meilleure représentation des femmes dans les affaires locales et régionales du Maroc, contribuant à leur inclusion dans les processus décisionnels. Elle s'inscrit dans une série de réformes visant à promouvoir l'égalité des sexes dans la société marocaine, en augmentant la participation des femmes dans la gouvernance locale et leur influence dans la politique nationale."
    ],
    "Loi sur la parité dans les collectivités locales" => [
        "pays" => "Sénégal",
        "date" => "2013",
        "description" => "En 2013, le Sénégal a adopté une loi visant à garantir la parité dans les collectivités locales. Cette loi impose des listes électorales paritaires, avec un nombre égal de femmes et d'hommes, pour les élections locales.",
        "impact" => "Le Sénégal a été l'un des premiers pays en Afrique à adopter des lois sur la parité dans les collectivités locales. En garantissant des listes électorales paritaires, cette loi a permis d'augmenter la représentation des femmes dans les instances locales, favorisant ainsi une plus grande égalité des sexes dans la prise de décision locale."
    ],
    "Loi imposant un quota de 40 % de femmes sur les listes électorales locales" => [
        "pays" => "Espagne",
        "date" => "2007",
        "description" => "La loi de 2007 en Espagne impose un quota de 40 % de femmes sur les listes électorales locales, avec l'objectif d'assurer une représentation égale des femmes et des hommes dans les organes décisionnels locaux.",
        "impact" => "Cette loi a permis une augmentation significative de la présence féminine dans les instances locales espagnoles, contribuant à une représentation plus équitable des femmes dans la prise de décision locale. Elle a également encouragé d'autres pays à adopter des politiques similaires pour améliorer la parité dans les institutions locales."
    ],
    "Loi sur la dépénalisation de l’homosexualité" => [
        "pays" => "France",
        "date" => "1791",
        "description" => "La France, en 1791, fut le premier pays au monde à dépénaliser l'homosexualité dans son Code pénal révisé. Cette loi a abrogé les peines de mort et de flagellation qui étaient auparavant infligées aux individus pratiquant l'homosexualité, marquant un tournant majeur dans l'histoire des droits des personnes LGBTQIA+.",
        "impact" => "Bien que cette loi ne concerne pas directement les femmes, elle a joué un rôle crucial dans la libération de l'expression sexuelle et l'égalité des droits en France. En dépénalisant l'homosexualité, cette loi a jeté les bases des luttes ultérieures pour les droits des femmes et des personnes LGBTQIA+. La dépénalisation a permis aux femmes lesbiennes et bisexuelles de vivre plus librement leur orientation sexuelle sans risquer de poursuites judiciaires. Ce fut un premier pas vers la reconnaissance des droits des femmes LGBTQIA+ dans un contexte socialement et politiquement conservateur."
    ],
    "Loi sur le mariage homosexuel" => [
        "pays" => "Pays-Bas",
        "date" => "2001",
        "description" => "Les Pays-Bas ont été le premier pays au monde à légaliser le mariage homosexuel en 2001. Cette loi permettait aux couples de même sexe de se marier, d'adopter des enfants, de partager des biens et d'hériter l'un de l'autre.",
        "impact" => "Cette loi a eu un impact direct sur les femmes lesbiennes, leur offrant la possibilité de se marier, de fonder une famille et de bénéficier des mêmes droits que les couples hétérosexuels. Elle a permis aux femmes lesbiennes de bénéficier d'une reconnaissance légale de leurs relations et de leur parentalité, renforçant ainsi les principes d'égalité des droits dans le cadre familial. Cette législation a servi de modèle pour d'autres pays qui ont ensuite légalisé le mariage homosexuel."
    ],
    "Loi sur l'égalité des droits des personnes LGBT et la non-discrimination fondée sur l'orientation sexuelle et l'identité de genre (Equality Act)" => [
        "pays" => "États-Unis",
        "date" => "2021",
        "description" => "L'Equality Act est une loi américaine qui vise à interdire toute forme de discrimination fondée sur l'orientation sexuelle et l'identité de genre dans divers domaines, y compris l'emploi, le logement, l'éducation et les services publics. Bien qu'elle soit en débat au sein du Congrès, sa proposition vise à étendre les protections offertes aux personnes LGBTQIA+ en les plaçant sous les mêmes protections que celles qui existent pour les races et les sexes, conformément à la Civil Rights Act de 1964.",
        "impact" => "Cette loi est significative pour les femmes transgenres et les femmes lesbiennes, car elle garantit la non-discrimination à l'égard de leur orientation sexuelle et de leur identité de genre dans des aspects essentiels de la vie quotidienne. Elle permet une reconnaissance légale et une protection contre les discriminations systémiques qui affectent spécifiquement les femmes LGBTQIA+, facilitant ainsi leur accès aux mêmes droits que les autres femmes."
    ],
    "Loi sur l’adoption par des couples de même sexe" => [
        "pays" => "Espagne",
        "date" => "2005",
        "description" => "En 2005, l'Espagne a légalisé l'adoption par des couples de même sexe, permettant ainsi aux couples homosexuels, y compris les femmes lesbiennes, d'adopter des enfants.",
        "impact" => "Cette législation a permis aux femmes lesbiennes de fonder une famille légalement et de bénéficier des mêmes droits parentaux que les couples hétérosexuels. Elle a renforcé les principes d'égalité des droits dans le cadre familial, permettant aux femmes lesbiennes de bénéficier d'une reconnaissance légale de leur parentalité."
    ],
    "Loi sur la non-discrimination des personnes LGBT" => [
        "pays" => "Argentine",
        "date" => "2011",
        "description" => "La loi argentine de 2011 interdit la discrimination fondée sur l'orientation sexuelle et l'identité de genre. Elle couvre divers domaines, y compris l'emploi, l'éducation, les soins de santé et l'accès aux services publics.",
        "impact" => "Cette législation a renforcé les droits des femmes transgenres et des femmes lesbiennes en Argentine, en garantissant la non-discrimination à l'égard de leur orientation sexuelle et de leur identité de genre dans des aspects essentiels de la vie quotidienne. Elle permet une reconnaissance légale et une protection contre les discriminations systémiques qui affectent spécifiquement les femmes LGBTQIA+, facilitant ainsi leur accès aux mêmes droits que les autres femmes."
    ],
    "Loi sur l'autodétermination du genre" => [
        "pays" => "Argentine",
        "date" => "2012",
        "description" => "La loi argentine de 2012 permet aux personnes transgenres de changer légalement de sexe sur leurs documents officiels sans avoir à subir des interventions chirurgicales.",
        "impact" => "Pour les femmes transgenres, cette loi a représenté un tournant majeur dans la reconnaissance légale de leur identité de genre. Elle a permis aux femmes transgenres de vivre en accord avec leur identité de genre sans avoir à subir des procédures médicales invasives. Cela a eu un impact considérable sur les femmes transgenres en termes de reconnaissance sociale et de dignité, tout en promouvant la non-discrimination fondée sur le genre."
    ],
    "Loi pour la reconnaissance des couples de même sexe (PACS)" => [
        "pays" => "France",
        "date" => "1999",
        "description" => "La loi française de 1999, instaurant le Pacte Civil de Solidarité (PACS), permet aux couples de même sexe, tout comme aux couples hétérosexuels, de conclure un contrat civil pour organiser leur vie commune. Bien qu'elle ne confère pas tous les droits associés au mariage, comme l'adoption conjointe d'enfants pour les couples de même sexe (jusqu'à la réforme de 2013), elle offre de nombreuses protections, notamment en matière de droits fiscaux, de succession et de couverture sociale.",
        "impact" => "Le PACS a été une avancée importante pour les femmes lesbiennes et bisexuelles en France, leur permettant de formaliser leur union légalement et de bénéficier de certains avantages sociaux et fiscaux. Bien que les droits liés à l'adoption aient été limités à l'époque de son adoption, cette loi a posé les bases pour une égalité accrue des droits dans les couples de même sexe, menant à la légalisation du mariage pour tous en 2013. Pour les femmes LGBTQIA+, c'est un moyen de reconnaître leur relation et de renforcer leurs droits."
    ],
    "Loi de dépénalisation de l’homosexualité" => [
        "pays" => "Inde",
        "date" => "2018",
        "description" => "En 2018, la Cour suprême de l'Inde a dépénalisé l'homosexualité en abrogeant l'article 377 du Code pénal indien, qui criminalisait les relations homosexuelles. Cette décision a été un tournant majeur dans l'histoire des droits des personnes LGBTQIA+ en Inde, où l'homosexualité était auparavant considérée comme un crime.",
        "impact" => "Bien que cette loi ne concerne pas directement les femmes, elle a eu un impact significatif sur les femmes lesbiennes et bisexuelles en Inde, leur permettant de vivre librement sans la peur d'être poursuivies. Elle a également contribué à réduire la stigmatisation et la discrimination à l'encontre des femmes LGBTQIA+, favorisant un environnement plus inclusif et respectueux de leurs droits."
    ],
    "Loi sur la reconnaissance du changement de sexe" => [
        "pays" => "Suède",
        "date" => "2022",
        "description" => "En 2022, la Suède a adopté une législation sur la reconnaissance du changement de sexe, permettant aux personnes transgenres de modifier leur sexe légalement sur leurs documents officiels sans avoir à subir une intervention médicale. Cette loi stipule que le changement de sexe est défini par l'absence de consentement, ce qui signifie que si une personne ne donne pas son consentement clair et explicite à une relation sexuelle, il s'agit d'un viol, même sans la présence de force physique.",
        "impact" => "Cette loi constitue une avancée majeure dans la reconnaissance des droits des femmes en matière de sexualité et de consentement. Elle place la responsabilité sur l'auteur du viol de prouver que le consentement a été donné, plutôt que sur la victime de prouver qu'elle a résisté. Cela permet de mieux protéger les femmes contre les agressions sexuelles et de rétablir un équilibre de pouvoir dans les relations sexuelles."
    ],
    "Loi sur l’adoption par des couples de même sexe" => [
        "pays" => "Espagne",
        "date" => "2005",
        "description" => "La loi espagnole de 2005 sur l'adoption par des couples de même sexe a permis aux couples homosexuels d'adopter des enfants, leur offrant ainsi les mêmes droits parentaux que les couples hétérosexuels.",
        "impact" => "Cette législation a eu un effet majeur dans la lutte pour l'égalité des droits des femmes en Espagne, en particulier pour les femmes lesbiennes et bisexuelles. Elle a permis aux femmes lesbiennes et bisexuelles de fonder une famille légalement et de bénéficier des mêmes droits parentaux que les couples hétérosexuels, renforçant ainsi les principes d'égalité et de non-discrimination."
    ],
    "Loi sur la non-discrimination des personnes LGBT" => [
        "pays" => "Argentine",
        "date" => "2019",
        "description" => "La loi argentine de 2019 sur la non-discrimination des personnes LGBT interdit toute forme de discrimination fondée sur l'orientation sexuelle et l'identité de genre dans divers domaines, y compris l'emploi, le logement, l'éducation et les services publics. Elle assure également que les personnes intersexes et transgenres aient accès à des services de santé adaptés à leurs besoins spécifiques.",
        "impact" => "Cette loi est significative pour les femmes transgenres et les femmes lesbiennes, car elle garantit la non-discrimination à l'égard de leur orientation sexuelle et de leur identité de genre dans des aspects essentiels de la vie quotidienne. Elle permet une reconnaissance légale et une protection contre les discriminations systémiques qui affectent spécifiquement les femmes LGBTQIA+, facilitant ainsi leur accès aux mêmes droits que les autres femmes."
    ],
    "Loi sur la protection des droits des personnes transgenres" => [
        "pays" => "Argentine",
        "date" => "2021",
        "description" => "La loi argentine de 2021 sur la protection des droits des personnes transgenres permet aux personnes transgenres de changer légalement de sexe sur leurs documents officiels sans avoir à subir une intervention médicale. Cette loi stipule que le changement de sexe est défini par l'absence de consentement, ce qui signifie que si une personne ne donne pas son consentement clair et explicite à une relation sexuelle, il s'agit d'un viol, même sans la présence de force physique.",
        "impact" => "Cette loi a été une avancée majeure dans la reconnaissance des droits des femmes en matière de sexualité et de consentement. Elle place la responsabilité sur l'auteur du viol de prouver que le consentement a été donné, plutôt que sur la victime de prouver qu'elle a résisté. Cela permet de mieux protéger les femmes contre les agressions sexuelles et de rétablir un équilibre de pouvoir dans les relations sexuelles."
    ],
    "Loi sur la reconnaissance des couples de même sexe" => [
        "pays" => "Irlande",
        "date" => "2015",
        "description" => "La loi irlandaise de 2015 sur la reconnaissance des couples de même sexe a permis aux couples homosexuels de se marier légalement, leur offrant ainsi les mêmes droits que les couples hétérosexuels.",
        "impact" => "Cette législation a eu un impact décisif pour les droits des femmes en Irlande, où l'homosexualité était auparavant interdite, sauf dans des cas très spécifiques. Ce changement a permis aux femmes lesbiennes et bisexuelles d'obtenir un accès légal au mariage, réduisant les risques liés aux mariages clandestins et offrant un cadre sécurisé pour les femmes."
    ],
    "Loi sur les quotas de genre dans le secteur public" => [
        "pays" => "Afrique du Sud",
        "date" => "2006",
        "description" => "En 2006, l'Afrique du Sud a introduit des quotas de genre dans le secteur public pour garantir une représentation égale des femmes et des hommes dans les postes de décision. La loi stipule que les autorités publiques doivent atteindre des objectifs spécifiques en matière de représentation des femmes dans leurs effectifs, en particulier dans les postes de direction.",
        "impact" => "Cette loi a permis une avancée significative dans la lutte pour l'égalité des sexes en Afrique du Sud, en particulier dans les sphères politiques et publiques. En imposant des quotas de genre, l'Afrique du Sud a cherché à surmonter les obstacles structurels qui empêchaient les femmes d'accéder à des postes de pouvoir."
    ],
    "Loi sur la lutte contre les discriminations salariales" => [
        "pays" => "Allemagne",
        "date" => "2022",
        "description" => "En 2022, l'Allemagne a introduit une législation renforçant l'égalité salariale entre hommes et femmes. La loi oblige les entreprises à publier des rapports sur les salaires et à rendre les écarts de rémunération entre sexes plus transparents. Les entreprises de plus de 200 employés sont tenues de justifier l'absence d'écarts salariaux dans leurs évaluations annuelles.",
        "impact" => "Cette loi marque une évolution importante pour l'égalité salariale en Allemagne, qui continue de faire face à un écart salarial significatif. En imposant la transparence et l'obligation de justifier les écarts, elle pousse les entreprises à prendre des mesures concrètes pour résoudre les inégalités salariales et améliore la capacité des femmes à revendiquer l'égalité de rémunération."
    ],
    "Loi contre la diffusion non consensuelle de contenus intimes" => [
        "pays" => "États-Unis (Californie)",
        "date" => "2013",
        "description" => "La California Cyber Exploitation Law de 2013 a été un pilier législatif pour lutter contre la diffusion non consensuelle de contenus intimes (souvent appelée 'revenge porn'). La loi pénalise sévèrement ceux qui partagent des images ou des vidéos explicites d’une personne sans son consentement, avec l’intention de causer du tort. Elle inclut des sanctions pénales et civiles et prévoit également la possibilité pour les victimes de signaler plus facilement les abus et d'obtenir des mesures légales pour interdire les comportements violents.",
        "impact" => "La loi répond spécifiquement à un problème qui touche principalement les femmes, à savoir l'exploitation de leur image à des fins de vengeance ou de manipulation. En offrant une voie légale pour se protéger contre le harcèlement sexuel, les menaces et la manipulation psychologique en ligne, elle protège la dignité, la sécurité et l'autonomie des femmes en ligne, et permet de lutter contre l'exploitation sexuelle numérique."
    ],
    "Loi sur la lutte contre le cyberharcèlement" => [
        "pays" => "Espagne",
        "date" => "2015",
        "description" => "La loi espagnole de 2015 a renforcé les mesures contre le cyberharcèlement, en particulier à l'égard des femmes, des enfants et des minorités. Cette législation couvre non seulement les menaces, les insultes et les comportements d'intimidation, mais elle introduit également des sanctions pour les comportements visant à nuire psychologiquement aux victimes via les réseaux sociaux, les applications et les plateformes en ligne. Les victimes peuvent signaler le harcèlement, et des actions légales peuvent être lancées pour interdire les comportements violents.",
        "impact" => "La loi offre aux femmes un cadre juridique pour se protéger contre les violences psychologiques et sexuelles en ligne. Étant donné que les femmes sont souvent les principales cibles de ce type de harcèlement, la loi est un outil essentiel pour leur garantir une protection dans l'espace numérique. Elle permet aussi de réduire la stigmatisation et les violences qui se produisent souvent à l'abri des technologies numériques."
    ],
    "Loi sur la protection des victimes de cyberviolence (violences psychologiques et sexuelles)" => [
        "pays" => "Argentine",
        "date" => "2019",
        "description" => "La loi argentine de 2019 a renforcé les mesures contre la cyberviolence, en incluant les violences psychologiques et sexuelles dans la définition de la cyberviolence. Cette législation vise à protéger les victimes contre les abus en ligne, y compris les menaces, le harcèlement, les intimidations, les violences sexuelles et la diffusion non consensuelle de contenus intimes. Elle établit des recours légaux pour les victimes, ainsi que des programmes de prévention pour sensibiliser le public aux dangers de la cyberviolence.",
        "impact" => "Étant donné que les femmes sont fréquemment les principales victimes de violence psychologique et sexuelle en ligne, cette loi est cruciale pour la sécurité des femmes sur Internet. Elle permet de mieux protéger les femmes contre les abus en ligne et de réduire les obstacles pour dénoncer les violences. Elle constitue également un outil éducatif et de prévention important pour lutter contre les inégalités de genre dans l'espace numérique."
    ],
    "Loi contre la diffusion de contenu sexuellement explicite sans consentement (loi sur la \"revenge porn\")" => [
        "pays" => "France",
        "date" => "2020",
        "description" => "La France a adopté une législation spécifique en 2020 pour lutter contre la diffusion non consensuelle de contenus sexuels explicites, souvent dans un contexte de vengeance ou de manipulation. Cette loi permet de punir ceux qui diffusent des images ou des vidéos explicites sans le consentement des personnes concernées. La législation prévoit également des mesures pour la diffusion de ces contenus sur les plateformes numériques, et elle garantit des mécanismes pour que les victimes puissent rapidement faire retirer ces contenus.",
        "impact" => "Cette loi a un impact significatif sur les femmes, qui sont les principales victimes de la diffusion non consensuelle de contenus sexuels. En offrant une protection juridique claire, elle permet aux victimes de retrouver leur dignité et de se défendre contre cette forme de violence numérique. La loi est également un outil crucial dans la lutte contre les inégalités de genre, car elle adresse spécifiquement une forme de violence qui touche de manière disproportionnée les femmes."
    ],
    "Loi sur la violation de la vie privée (Section 66E du Information Technology Act)" => [
        "pays" => "Inde",
        "date" => "2016",
        "description" => "La Section 66E du Information Technology Act de l'Inde criminalise la violation de la vie privée en ligne. Elle concerne la captation et la publication non consensuelle d'images ou de vidéos intimes. La loi renforce les sanctions contre les auteurs de tels crimes et facilite l'identification des victimes. Elle vise à protéger les individus, en particulier les femmes, contre les abus en ligne, en garantissant que les victimes puissent signaler facilement les incidents et que des mesures légales appropriées soient prises rapidement.",
        "impact" => "Cette loi a une importance particulière pour les femmes en Inde, où les violations de la vie privée en ligne, y compris le voyeurisme et la diffusion de contenus intimes sans consentement, sont des problèmes majeurs. Elle permet de mieux protéger les femmes contre les abus en ligne et de réduire les obstacles pour dénoncer les violences. Elle contribue également à un environnement numérique plus sûr pour les femmes et à une réduction des inégalités de genre dans le monde numérique."
    ],
    "Loi contre le cyberharcèlement sexuel" => [
        "pays" => "Mexique",
        "date" => "2015",
        "description" => "Le Mexique a introduit une législation pour lutter contre le cyberharcèlement sexuel, une forme de violence numérique qui touche principalement les femmes. Cette loi rend illégales les formes de harcèlement sexuel en ligne, y compris l'envoi de messages, d'images ou de vidéos à caractère sexuel non sollicités. Elle prévoit des sanctions contre ceux qui utilisent les technologies numériques pour harceler sexuellement une personne, et offre aux victimes la possibilité de signaler facilement les abus et d'obtenir des mesures légales pour interdire les comportements violents.",
        "impact" => "Le cyberharcèlement sexuel affecte particulièrement les femmes et leur espace numérique. Cette loi permet de protéger les femmes contre des formes de violence numérique qui sont souvent ignorées ou minimisées dans d'autres contextes. Elle est essentielle pour garantir la sécurité des femmes sur Internet et pour créer un environnement numérique plus sûr et égalitaire. Elle renforce l'autonomie des femmes dans la sphère publique et privée en ligne."
    ],
    "Loi pour la prévention des violences sexistes numériques" => [
        "pays" => "Colombie",
        "date" => "2020",
        "description" => "La loi colombienne de 2020 a renforcé les mesures contre les violences sexistes numériques. Cette législation vise à prévenir et punir les violences sexistes numériques. Elle inclut des mesures pour lutter contre le harcèlement sexuel en ligne, la diffusion non consensuelle de contenus intimes, ainsi que la cyberviolence basée sur le genre. Elle reconnaît le droit à la non-discrimination et à la protection contre les violences sexistes dans le domaine numérique.",
        "impact" => "Cette loi représente un pas important pour la protection des femmes contre les violences sexistes en ligne. Elle permet de mieux protéger les femmes contre les abus en ligne et de réduire les obstacles pour dénoncer les violences. Elle contribue également à un environnement numérique plus sûr pour les femmes et à une réduction des inégalités de genre dans le monde numérique."
    ],
    "Loi sur la confidentialité des données personnelles et la protection des femmes en ligne (RGPD)" => [
        "pays" => "Union européenne",
        "date" => "2018",
        "description" => "Le RGPD, qui est entré en vigueur en mai 2018, est une législation de l'Union européenne qui régit la protection des données personnelles des individus. Bien que le RGPD soit destiné à protéger les données personnelles de tous les citoyens européens en général, il a un impact particulier sur les femmes, notamment en ce qui concerne la gestion de leurs informations personnelles en ligne. Il impose aux entreprises de recueillir explicitement le consentement des utilisateurs pour collecter, traiter et stocker leurs données personnelles, offrant ainsi une meilleure sécurité contre les abus numériques.",
        "impact" => "Le RGPD permet de protéger les femmes contre l'exploitation de leurs données personnelles par des entreprises, des plateformes numériques et des tiers. En garantissant le droit à la confidentialité et à la sécurité des données personnelles, cette loi donne aux femmes un plus grand contrôle sur leur vie privée, contribuant ainsi à leur autonomie et à leur égalité dans la sphère publique et privée en ligne."
    ],
    "Loi n° 2016-1321 du 7 octobre 2016 sur la lutte contre la diffusion de contenus intimes sans consentement" => [
        "pays" => "France",
        "date" => "2016",
        "description" => "La loi du 7 octobre 2016 en France est une législation importante dans la lutte contre le 'revenge porn' ou la diffusion non consensuelle de contenus intimes. Elle sanctionne les comportements de diffusion d'images ou de vidéos à caractère sexuel sans le consentement explicite des personnes concernées, avec l’intention de nuire psychologiquement ou de causer du tort. Les auteurs de tels contenus peuvent être poursuivis et condamnés à des amendes et, dans certains cas, à des peines de prison.",
        "impact" => "Cette loi est particulièrement bénéfique pour les femmes, qui sont les principales victimes de ce type de cyberharcèlement. Elle offre une voie légale pour se protéger contre le harcèlement sexuel, les menaces et autres abus en ligne. Elle transmet un message clair sur la volonté de la société de traiter le harcèlement de rue comme une forme de violence sexiste et d'agression."
    ],
    "Loi sur l’obligation de parité dans les institutions culturelles publiques (loi relative à l’égalité réelle)" => [
        "pays" => "France",
        "date" => "2014",
        "description" => "Cette loi s’inscrit dans une démarche globale d’égalité entre les sexes. Dans le domaine culturel, elle impose aux institutions culturelles publiques (théâtres nationaux, opéras, musées, etc.) de respecter des critères de parité dans leurs nominations, leur programmation et leurs subventions. L’objectif est de combattre les stéréotypes de genre dans la culture, tout en favorisant l'accès des femmes aux postes de direction et à la reconnaissance artistique.",
        "impact" => "La loi répond à une réalité où les femmes, malgré leur présence dans les métiers artistiques, restent sous-représentées dans les postes de direction ou comme autrices d’œuvres diffusées. En imposant une meilleure répartition des responsabilités et des opportunités, elle permet aux femmes artistes, techniciennes ou dirigeantes culturelles de sortir de l’ombre. C’est une mesure concrète pour déconstruire l’invisibilisation des femmes dans la production culturelle."
    ],
    "Loi sur la transparence et l’égalité salariale dans le secteur artistique et culturel" => [
        "pays" => "Islande",
        "date" => "2016",
        "description" => "L’Islande, pionnière en matière d’égalité des sexes, a renforcé ses législations avec une obligation pour les institutions culturelles d’assurer une transparence des rémunérations, et de démontrer que les femmes et les hommes y sont rémunérés équitablement. Les organisations artistiques sont tenues de publier leurs données salariales et de corriger tout écart injustifié sous peine de sanctions.",
        "impact" => "Cette loi a un effet direct sur la valorisation du travail des femmes dans les arts. Elle réduit les inégalités salariales dans des métiers souvent précaires, en rendant visibles les écarts et en imposant des correctifs. Elle sert de modèle à d’autres pays nordiques et met en lumière une volonté politique ferme de justice sociale par le biais de la culture."
    ],
    "Loi sur la représentation équilibrée des genres dans les conseils d’administration des institutions culturelles" => [
        "pays" => "Norvège",
        "date" => "2011",
        "description" => "La Norvège a instauré en 2011 une obligation de parité dans les conseils d'administration des institutions culturelles financées par l'État. Cette loi impose un quota de 40 % minimum de femmes (ou d’hommes) dans ces conseils, afin de garantir une représentation équitable dans la prise de décision culturelle.",
        "impact" => "Cette mesure participe à déconstruire les hiérarchies patriarcales dans les sphères du pouvoir culturel. Elle offre aux femmes des positions d’influence là où elles étaient historiquement absentes. Elle permet également de mieux refléter la diversité de la société dans les politiques culturelles et d'encourager des choix artistiques plus inclusifs. La Norvège, souvent citée en exemple en matière d’égalité, inspire d’autres pays à adopter des mesures similaires."
    ],
    "Loi sur l’égalité des droits pour les personnes transgenres" => [
        "pays" => "Irlande",
        "date" => "2014",
        "description" => "Cette loi permet aux personnes transgenres de faire reconnaître légalement leur genre sur les documents officiels par simple autodéclaration, sans obligation de subir des interventions médicales ou de fournir des preuves psychiatriques. Cependant, elle impose que les personnes mariées ou en partenariat civil doivent divorcer pour obtenir cette reconnaissance, ce qui a été critiqué comme une atteinte aux droits des personnes transgenres mariées.",
        "impact" => "La loi a été saluée comme une avancée majeure pour les droits des personnes transgenres en Irlande, bien que des critiques subsistent concernant l'obligation de divorce."
    ],
    "Loi sur l’égalité des droits pour les personnes intersexes" => [
        "pays" => "Malta",
        "date" => "2019",
        "description" => "Cette loi interdit toute intervention médicale non consentie visant à normaliser les caractéristiques sexuelles des enfants intersexes. Elle reconnaît le droit à l'intégrité corporelle et à l'autonomie physique, interdisant les justifications médicales basées sur des considérations sociales.",
        "impact" => "Malte est devenue le premier pays au monde à interdire légalement les chirurgies de normalisation sur les enfants intersexes sans leur consentement, établissant un précédent en matière de droits humains."
    ],
    "Loi sur la reconnaissance juridique des couples de même sexe" => [
        "pays" => "Taiwan",
        "date" => "2019",
        "description" => "Suite à une décision de la Cour constitutionnelle en 2017 déclarant l'interdiction du mariage homosexuel inconstitutionnelle, cette loi a été adoptée pour légaliser le mariage entre personnes de même sexe. Elle accorde aux couples homosexuels des droits similaires à ceux des couples hétérosexuels, bien que certaines restrictions subsistent, notamment en matière d'adoption.",
        "impact" => "Taïwan est devenu le premier pays d'Asie à légaliser le mariage homosexuel, marquant une étape historique pour les droits LGBT+ dans la région."
    ],
    "Loi sur la protection des droits des personnes LGBT et intersexes" => [
        "pays" => "Australie",
        "date" => "2018",
        "description" => "En mars 2018, le Territoire du Nord est devenu la dernière juridiction australienne à légaliser l'adoption pour les couples de même sexe, complétant ainsi l'égalité en matière d'adoption à l'échelle nationale.",
        "impact" => "Cette avancée a renforcé les droits des familles LGBT+ en Australie, assurant une reconnaissance égale devant la loi pour les parents de même sexe."
    ],
    "Loi sur l’accès des personnes transgenres à la santé reproductive (Affordable Care Act)" => [
        "pays" => "États-Unis",
        "date" => "2010",
        "description" => "La Section 1557 de l'Affordable Care Act interdit la discrimination dans les programmes de santé financés par le gouvernement fédéral, y compris sur la base de l'identité de genre. Cela a élargi l'accès aux soins de santé pour les personnes transgenres, y compris les soins liés à la transition.",
        "impact" => "Cette disposition a été une avancée significative pour l'accès équitable aux soins de santé pour les personnes transgenres aux États-Unis."
    ],
    "Loi contre le harcèlement en ligne" => [
        "pays" => "États-Unis",
        "date" => "2013",
        "description" => " Cette loi fédérale criminalise les menaces transmises via des moyens de communication interétatiques, y compris par Internet, qui visent à extorquer, kidnapper ou blesser autrui, ou à endommager la réputation d'une personne.",
        "impact" => "Bien que non spécifiquement ciblée sur les femmes ou les personnes LGBT+, cette loi offre un cadre juridique pour lutter contre le harcèlement en ligne, dont ces groupes sont souvent victimes."
    ],
    "Loi sur la protection contre les violences sexuelles en ligne" => [
        "pays" => "Royaume-Uni",
        "date" => "2016",
        "description" => " Cette loi vise à améliorer la réponse du système judiciaire aux comportements abusifs et aux préjudices sexuels. Elle introduit des mesures pour renforcer la protection des victimes, notamment en permettant aux juges de fournir des informations spécifiques aux jurés dans les procès pour infractions sexuelles, afin de contester les préjugés sur la manière dont les agressions sexuelles se produisent. ",
        "impact" => "La loi a renforcé la protection des femmes contre les violences sexuelles, y compris en ligne, en améliorant la sensibilisation des jurés et en assurant une meilleure prise en compte des réalités des victimes dans le système judiciaire.​"
    ],
    "Loi sur la protection des victimes de harcèlement en ligne" => [
        "pays" => "Australie",
        "date" => "2016",
        "description" => "Cette loi fédérale criminalise le harcèlement en ligne, y compris la menace, le harcèlement ou l'offense causée par l'utilisation de services de télécommunications. Elle prévoit des sanctions pénales pour les comportements abusifs en ligne, offrant ainsi une protection juridique aux victimes de harcèlement numérique. ",
        "impact" => "La loi a fourni un cadre juridique pour poursuivre les auteurs de harcèlement en ligne, un problème qui affecte de manière disproportionnée les femmes, renforçant ainsi leur protection dans l'espace numérique.​"
    ],
    "Loi sur l'interdiction de la cyberviolence basée sur le genre" => [
        "pays" => "Canada",
        "date" => "2019",
        "description" => "Le gouvernement canadien a mis en œuvre une stratégie nationale pour prévenir et contrer la violence fondée sur le sexe, y compris la cyberviolence. Cette stratégie comprend des investissements dans des programmes visant à sensibiliser, prévenir et soutenir les victimes de cyberviolence basée sur le genre.",
        "impact" => "La stratégie a permis de reconnaître la cyberviolence comme une forme réelle de violence, avec des conséquences tangibles, et a renforcé les efforts pour protéger les femmes et les filles dans l'espace numérique."
    ],
    "Loi sur l’accès à la justice numérique pour les victimes de violence domestique et sexuelle en ligne" => [
        "pays" => "Italie",
        "date" => "2019",
        "description" => "Cette loi introduit des mesures pour accélérer les procédures judiciaires concernant les violences domestiques et sexuelles, y compris celles commises en ligne. Elle prévoit des modifications du code pénal et du code de procédure pénale pour renforcer la protection des victimes et faciliter l'accès à la justice.",
        "impact" => "La loi a amélioré la réponse du système judiciaire aux violences basées sur le genre, y compris en ligne, en assurant une prise en charge plus rapide et efficace des victimes.​"
    ],
    "Loi n° 2018-5 du 9 mai 2018 contre les violences numériques" => [
        "pays" => "Tunisie",
        "date" => "2018",
        "description" => "Cette loi historique adopte une approche globale pour éliminer la violence à l'égard des femmes, y compris la violence numérique. Elle prévoit des mesures de prévention, de protection et de soutien aux victimes, ainsi que des sanctions pour les auteurs de violences, y compris celles commises en ligne.",
        "impact" => "La loi a marqué une avancée significative dans la reconnaissance et la lutte contre toutes les formes de violence à l'égard des femmes en Tunisie, y compris la violence numérique, en offrant un cadre juridique complet pour leur protection.​"
    ],
    "Loi sur l’égalité d’accès des femmes au sport (Title IX)" => [
        "pays" => "États-Unis",
        "date" => "1972",
        "description" => "Title IX est une disposition législative qui interdit la discrimination fondée sur le sexe dans tout programme ou activité éducative recevant un financement fédéral. Bien que couvrant divers aspects de l'éducation, elle est particulièrement connue pour avoir transformé le paysage du sport féminin en exigeant une égalité d'accès et de financement pour les programmes sportifs féminins.",
        "impact" => "Title IX a entraîné une augmentation spectaculaire de la participation des filles et des femmes aux sports scolaires et universitaires, favorisant l'égalité des sexes dans l'éducation et contribuant à l'émancipation des femmes à travers le sport.​"
    ],
    "Loi sur l’interdiction de la discrimination basée sur le genre dans les sports scolaires (Title IX)" => [
        "pays" => "États-Unis",
        "date" => "1975",
        "description" => "Bien que Title IX ait été adopté en 1972, c'est en 1975 que le Département de la Santé, de l'Éducation et du Bien-être social a publié des règlements détaillant son application, notamment dans le domaine des sports scolaires. Ces règlements exigeaient que les établissements éducatifs financés par des fonds fédéraux offrent des opportunités équitables aux femmes dans les programmes sportifs, y compris en matière de financement, d'équipements et d'accès aux installations.",
        "impact" => "L'application de ces règlements a entraîné une augmentation significative de la participation des femmes aux sports scolaires et universitaires, contribuant à réduire les inégalités de genre dans le domaine sportif."
    ],
    "Loi sur la promotion des femmes dans les métiers du cinéma et de la culture" => [
        "pays" => "France",
        "date" => "2009",
        "description" => "La loi Hadopi, principalement connue pour lutter contre le piratage numérique, a également eu des implications dans la promotion de la diversité culturelle. Bien qu'elle ne cible pas spécifiquement la promotion des femmes dans le cinéma, elle a renforcé les mécanismes de soutien à la création, permettant indirectement une meilleure représentation des femmes dans les métiers du cinéma et de la culture.",
        "impact" => "En renforçant les soutiens à la création et à la diversité culturelle, la loi a contribué à offrir davantage d'opportunités aux femmes dans les secteurs du cinéma et de la culture, favorisant ainsi une représentation plus équitable."
    ],
    "Loi sur la protection des athlètes féminines contre le harcèlement et les abus dans le sport" => [
        "pays" => "Royaume-Uni",
        "date" => "2019",
        "description" => "Cette loi a renforcé les obligations des employeurs, y compris dans le secteur sportif, pour prévenir le harcèlement sexuel sur le lieu de travail. Elle impose aux organisations sportives de mettre en place des mesures proactives pour protéger les athlètes, en particulier les femmes, contre le harcèlement et les abus.",
        "impact" => "La loi a établi un cadre juridique plus strict pour prévenir le harcèlement dans le sport, offrant ainsi une meilleure protection aux athlètes féminines et encourageant un environnement sportif plus sûr et inclusif.​"
    ],
    "Loi sur l’égalité d’accès des femmes aux événements sportifs" => [
        "pays" => "Arabie Saoudite",
        "date" => "2018",
        "description" => "Pour la première fois, l'Arabie Saoudite a autorisé les femmes à assister à des événements sportifs dans des stades publics. Des sections spéciales ont été aménagées pour accueillir les femmes dans trois stades majeurs du pays, marquant une avancée significative dans les droits des femmes dans le royaume.",
        "impact" => "Cette mesure a représenté une étape importante vers une plus grande inclusion des femmes dans la vie publique et sportive en Arabie Saoudite, bien que des restrictions subsistent quant à leur participation active dans le sport."
    ],
    "Loi sur l’égalité salariale dans les compétitions sportives féminines" => [
        "pays" => "France",
        "date" => "2021",
        "description" => "Cette loi vise à réduire les écarts de rémunération entre les athlètes masculins et féminins en imposant des obligations de transparence salariale aux fédérations sportives et en encourageant des politiques de rémunération équitables.",
        "impact" => "En promouvant l'égalité salariale, la loi contribue à valoriser le sport féminin et à reconnaître les performances des athlètes féminines à leur juste valeur."
    ],
    "Loi sur la parité dans les instances dirigeantes des fédérations sportives (Loi Sport et Société)" => [
        "pays" => "France",
        "date" => "2022",
        "description" => "Cette loi impose des quotas de parité dans les instances dirigeantes des fédérations sportives, avec une application immédiate au niveau national et une mise en œuvre prévue pour 2028 au niveau local. Elle vise à renforcer la représentation des femmes dans les postes de décision au sein du sport français.",
        "impact" => "En favorisant une gouvernance plus équilibrée, la loi contribue à une meilleure prise en compte des enjeux liés au sport féminin et à une représentation plus équitable des femmes dans les sphères décisionnelles du sport.​"
    ],
];

$titre = isset($_GET['titre']) ? urldecode($_GET['titre']) : 'Loi inconnue';
$info = $detailsLois[$titre] ?? null;

if ($info) {
    $pays = htmlspecialchars($info['pays']);
    $date = htmlspecialchars($info['date']);
    $description = $info['description'];
    $impact = $info['impact'];
} else {
    $pays = 'Pays inconnu';
    $date = 'Date inconnue';
    $description = "Aucune description disponible pour cette loi.";
    $impact = "Aucun impact enregistré.";
}

// ajout fav
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ajouter_favori"]) && isset($_SESSION["username"])) {
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ?");
    $stmt->execute([$_SESSION["username"]]);
    $user = $stmt->fetch();

    if ($user) {
        $stmt = $pdo->prepare("INSERT INTO favoris (utilisateur_id, type_favori, id_favori) VALUES (?, 'loi', ?)");
        $stmt->execute([$user['id'], $titre]);

        header("Location: loi.php?titre=" . urlencode($titre));
        exit();
    }
}

// enregistrer comm
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["commentaire"]) && !empty(trim($_POST["commentaire"]))) {
    $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE username = ?");
    $stmt->execute([$_SESSION["username"]]);
    $user = $stmt->fetch();
    $userId = $user['id'];

    $contenu = htmlspecialchars($_POST["commentaire"]);
    $stmt = $pdo->prepare("INSERT INTO loi_commentaires (titre_loi, user_id, contenu) VALUES (?, ?, ?)");
    $stmt->execute([$titre, $userId, $contenu]);

    header("Location: loi.php?titre=" . urlencode($titre));
    exit();
}

// recup les comms
$stmt = $pdo->prepare("SELECT c.*, u.username FROM loi_commentaires c JOIN utilisateurs u ON c.user_id = u.id WHERE c.titre_loi = ? ORDER BY c.date_commentaire DESC");
$stmt->execute([$titre]);
$commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["supprimer_commentaire_id"]) && isset($_SESSION["username"]) && $_SESSION["username"] === "SabanaSuresh") {
    $idCommentaire = intval($_POST["supprimer_commentaire_id"]);
    $stmt = $pdo->prepare("DELETE FROM loi_commentaires WHERE id = ?");
    $stmt->execute([$idCommentaire]);
    
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($titre); ?> - EmpowHer</title>
    <style>
        body { font-family: 'Times New Roman', serif; margin: 0; padding: 0; background-color: #fbfcfc; display: flex; flex-direction: column; min-height: 100vh; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 20px; background-color: #ca83f7; }
        header h1 { margin: 0; text-align: center; flex-grow: 1; }
        nav { display: flex; flex-direction: column; align-items: flex-end; }
        nav button { margin-bottom: 10px; }
        .banner { width: 100%; height: 200px; background-image: url('banner.png'); background-size: cover; background-position: center; }
        .main-content { flex-grow: 1; padding: 40px 20px; max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; }
        .law-title { text-align: center; font-size: 28px; font-weight: bold; }
        .law-meta { text-align: right; font-style: italic; margin-top: 10px; color: #555; width: 100%; }
        .law-description { margin-top: 30px; line-height: 1.6; font-size: 16px; text-align: justify; }
        .law-impact { margin-top: 40px; padding: 15px; background-color: #f2e5ff; border-left: 4px solid #ca83f7; width: 100%; }
        .comments-section { margin-top: 50px; width: 100%; }
        .comments-section textarea { width: 100%; height: 100px; padding: 10px; font-family: 'Times New Roman', serif; margin-bottom: 10px; }
        .comment-block { background-color: #eee; padding: 10px; margin-top: 10px; border-radius: 5px; }
        .comment-meta { font-size: 12px; color: #666; margin-bottom: 5px; }
        .footer-actions { text-align: right; margin-top: 20px; width: 100%; }
        .footer-actions a, .footer-actions form { display: inline-block; margin-left: 10px; }
        .retour { margin-top: 40px; width: 100%; }
        .retour a { text-decoration: none; color: #333; font-size: 14px; }
        .footer { text-align: center; padding: 10px; background-color: #ca83f7; margin-top: auto; }
        .footer-links { display: flex; justify-content: space-between; width: 100%; max-width: 800px; margin: 0 auto; }
    </style>
</head>
<body>

<header>
    <a href="site.php" style="display: flex; align-items: center; text-decoration: none; color: inherit; flex-grow: 1; justify-content: center;">
        <img src="logo.png" alt="Logo" width="50">
        <h1 style="margin-left: 10px;">EmpowHer</h1>
    </a>
    <nav>
        <?php if (isset($_SESSION["username"])): ?>
            <a href="profil.php" style="text-decoration: none; color: inherit;">
                <button><?php echo htmlspecialchars($_SESSION["username"]); ?></button>
            </a>
        <?php else: ?>
            <a href="connexion.html" style="text-decoration: none; color: inherit;">
                <button>Créer compte / Connexion</button>
            </a>
        <?php endif; ?>
    </nav>
</header>

<div class="banner"></div>

<div class="main-content">
    <div class="law-title"><?php echo htmlspecialchars($titre); ?></div>
    <div class="law-meta"><?php echo "$pays - $date"; ?></div>

    <div class="law-description">
        <p><?php echo htmlspecialchars($description); ?></p>
    </div>

    <div class="law-impact">
        <strong>Impact sur la cause féminine :</strong><br>
        <?php echo htmlspecialchars($impact); ?>
    </div>

    <div class="comments-section">
        <form method="POST">
            <textarea name="commentaire" placeholder="Votre commentaire..." required></textarea>
            <button type="submit" style="margin-top: 5px; padding: 5px 10px;">Envoyer</button>
        </form>

        <?php if (count($commentaires) > 0): ?>
            <h3 style="margin-top: 30px;">Commentaires :</h3>
            <?php foreach ($commentaires as $com): ?>
                <div class="comment-block">
                    <div class="comment-meta">
                        <?php echo htmlspecialchars($com['username']); ?> – <?php echo date('d/m/Y H:i', strtotime($com['date_commentaire'])); ?>
                    </div>
                    <div>
                        <?php echo nl2br(htmlspecialchars($com['contenu'])); ?>
                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'SabanaSuresh'): ?>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="supprimer_commentaire_id" value="<?php echo $com['id']; ?>">
                                <button type="submit" style="margin-left:10px; background-color:red; color:white; border:none; padding:2px 5px;">Supprimer</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="footer-actions">
        <?php if (isset($_SESSION["username"])): ?>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="ajouter_favori" value="1">
                <button type="submit" style="background:none; border:none; color:inherit; cursor:pointer;">⭐ Ajouter aux favoris</button>
            </form>
        <?php else: ?>
            <a href="connexion.html" style="color: inherit;">⭐ Connectez-vous pour ajouter aux favoris</a>
        <?php endif; ?>
        
        <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($titre); ?>&url=<?php echo urlencode('https://tonsite.com/loi.php?titre=' . urlencode($titre)); ?>" target="_blank">Partager sur X (Twitter)</a>
    </div>

    <div class="retour">
        ← <a href="lois.php">Retour au wiki des lois</a>
    </div>
</div>

<footer class="footer">
    <div class="footer-links">
        <a href="liens_utiles.php">Liens utiles</a>
        <span>|</span> 
        <a href="contact.php">Contact</a>
        <span>|</span> 
        <a href="politique.php">Politique de confidentialité</a>
    </div>
</footer>

</body>
</html>

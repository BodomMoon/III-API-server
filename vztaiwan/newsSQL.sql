CREATE database News;

CREATE TABLE news (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        text text NOT NULL,
        PRIMARY KEY (id),
        KEY slug (slug)
);
INSERT INTO `News`.`news` (`id`, `title`, `slug`, `text`) VALUES (NULL, 'Write Like You Talk', 'false', 'Here\'s a simple trick for getting more people to read what you write: write in spoken language. Something comes over most people when they start writing. They write in a different language than they\'d use if they were talking to a friend. The sentence structure and even the words are different. No one uses "pen" as a verb in spoken English. You\'d feel like an idiot using "pen" instead of "write" in a conversation with a friend.');
INSERT INTO `News`.`news` (`id`, `title`, `slug`, `text`) VALUES (NULL, 'A decade at google', 'true', 'One of the key challenges you face in an industrial research lab is how to choose your projects. You want your projects to be interesting research but also contribute to your company. As a junior researcher, you’re typically in the situation of choosing a project to join, while later in your career you are expected to come up with and lead your own projects. Regardless of your age, you have to make an educated decision.');
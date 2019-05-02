
CREATE TABLE items (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  created datetime NOT NULL COMMENT '登録日時',
  modified datetime COMMENT '更新日時',
  name varchar(150) NOT NULL COMMENT '商品名',
  description text COMMENT '商品説明',
  price int(10) unsigned NOT NULL COMMENT '価格',
  photo varchar(40) COMMENT '写真',
  PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


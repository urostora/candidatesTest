if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'manufacturer') THEN

	CREATE TABLE manufacturer (
		id			INT				NOT NULL 		AUTO_INCREMENT,
		name		VARCHAR(50)		NOT NULL,
		PRIMARY KEY PK_manufacturer (id)
	);

	INSERT INTO manufacturer (name) VALUES ('LG', 'Samsung', 'Sony', 'Dell', 'HP');

END IF;

if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'category') THEN

	CREATE TABLE category (
		id			INT				NOT NULL 		AUTO_INCREMENT,
		name		VARCHAR(50)		NOT NULL,
		parentId	INT				NULL,
		FOREIGN KEY FK_category_parent (parentId) REFERENCES category (id),
		PRIMARY KEY PK_category (id)
	);

END IF;

if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'product') THEN

	CREATE TABLE product (
		id				INT				NOT NULL 	AUTO_INCREMENT,
		status			INT				NOT NULL	DEFAULT 0		COMMENT '0 - active, 1 - deleted, 2 - disabled',
		manufacturerId	INT				NOT NULL					COMMENT 'Manufacturer',
		categoryId		INT				NOT NULL					COMMENT 'Category',
		name			VARCHAR(50)		NOT NULL					COMMENT 'Product name',
		description		VARCHAR(512)	NOT NULL					COMMENT 'Product description',
		imageUrl		varchar(255)	NULL						COMMENT 'Product image url',
		price			DECIMAL(10,2)	NOT NULL					COMMENT 'Unit price of product',
		quantity		INT				NOT NULL					COMMENT 'Current quantity',
		createdOn		DATETIME		NOT NULL	DEFAULT CURRENT_TIMESTAMP,
		updatedOn		DATETIME		NOT NULL	DEFAULT CURRENT_TIMESTAMP	ON UPDATE CURRENT_TIMESTAMP,
		PRIMARY KEY PK_product (id),
		FOREIGN KEY FK_product_manufacturer (manufacturerId) REFERENCES manufacturer (id),
		FOREIGN KEY FK_product_category (categoryId) REFERENCES category (id)
	);

END IF;

if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'tag') THEN

	CREATE TABLE tag (
		id				INT				NOT NULL 	AUTO_INCREMENT,
		name			VARCHAR(50)		NOT NULL					COMMENT 'Tag name',
		PRIMARY KEY PK_tag (id)
	);

END IF;

if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'productTag') THEN

	CREATE TABLE productTag (
		productId	INT		NOT NULL	COMMENT 'Product identifier',
		tagId		INT		NOT NULL	COMMENT 'Tag identifier',
		FOREIGN KEY FK_product_tag_product (productId) REFERENCES product (id),
		FOREIGN KEY FK_product_tag_tag (tagId) REFERENCES tag (id)
	);

END IF;

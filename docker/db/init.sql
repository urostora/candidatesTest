
SET NAMES utf8mb4;

DROP PROCEDURE IF EXISTS init_db;

DELIMITER $$

CREATE PROCEDURE init_db()
BEGIN

	if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'manufacturer') THEN
	
		CREATE TABLE manufacturer (
			id			INT				NOT NULL 		AUTO_INCREMENT,
			name		VARCHAR(50)		NOT NULL,
			PRIMARY KEY PK_manufacturer (id)
		);
	
		INSERT INTO manufacturer (name) VALUES ('LG'), ('Samsung'), ('Sony'), ('Dell'), ('HP');
	
	END IF;
	
	if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'category') THEN
	
		CREATE TABLE category (
			id			INT				NOT NULL 		AUTO_INCREMENT,
			name		VARCHAR(50)		NOT NULL,
			parentId	INT				NULL,
			FOREIGN KEY FK_category_parent (parentId) REFERENCES category (id),
			PRIMARY KEY PK_category (id)
		);
	
		INSERT INTO category
			(name, parentId)
		VALUES
			('Számítógép', null),
			('Asztali PC', 1),
			('Notebook', 1),
			('Monitor', null),
			('22" alatt', 4),
			('22" - 24" között', 4),
			('24" felett', 4);
	
	END IF;
	
	if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'tag') THEN
	
		CREATE TABLE tag (
			id				INT				NOT NULL 	AUTO_INCREMENT,
			name			VARCHAR(50)		NOT NULL					COMMENT 'Tag name',
			PRIMARY KEY PK_tag (id)
		);
	
		INSERT INTO tag (name)
		VALUES
			('Akciós'),
			('Új'),
			('Kifutó'),
			('Előrendelés')
		;
	
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
	
		INSERT INTO product
			(manufacturerId, categoryId, name, description, imageUrl, price, quantity)
		VALUES
			(1, 6,
			'LG 22MP410-B monitor 21,45"', '21,45”-os Full HD monitor
AMD FreeSync™
Olvasó üzemmód
Vibrálásmentes kép
DAS / Black Stabilizer / Célkereszt funkció
OnScreen Control',
			'https://www.lg.com/hu/monitorok/lg-22mp410-b',
			45500,
			25),
			(1, 7,
			'LG 27GP750-B 27" monitor',
			'27”-os Full HD (1920 x 1080) kijelző
240 Hz-es képfrissítési sebesség
IPS 1 ms (GtG)
HDR10 és sRGB 99% (Tip.)
Kompatibilis az NVIDIA G-Sync® technológiával
AMD FreeSync™ Premium',
			'https://www.lg.com/hu/monitorok/lg-27gp750-b',
			77800,
			12),
			(2, 7,
			'Samsung LS27AG320NUXEN 27" monitor',
			'165Hz frissítési ráta
	Győzz le minden ellenséget. A 165 Hz-es frissítési frekvencia kiküszöböli a késést és az elmosódottságot, így izgalmas játékmenetet biztosít az ultrasima akciókkal.',
			'https://www.samsung.com/hu/monitors/gaming/odyssey-g32a-g3-27-inch-165hz---freesync-ls27ag320nuxen/',
			97800,
			8),
			(5, 3,
			'HP ProBook 455 G8 Notebook PC 1Y9H1AV',
			'HP ProBook 455 G8 noteszgép, 15.6", Windows 10 Pro, AMD Ryzen™ 5, 8GB RAM, 256GB SSD-meghajtó, FHD',
			'https://www.hp.com/hu-hu/products/laptops/product-details/2100833391',
			365000,
			13)
		;
	
	END IF;
	
	if not exists (SELECT 1 FROM information_schema.TABLES t WHERE t.TABLE_SCHEMA = SCHEMA() AND t.TABLE_NAME = 'productTag') THEN
	
		CREATE TABLE productTag (
			productId	INT		NOT NULL	COMMENT 'Product identifier',
			tagId		INT		NOT NULL	COMMENT 'Tag identifier',
			FOREIGN KEY FK_product_tag_product (productId) REFERENCES product (id),
			FOREIGN KEY FK_product_tag_tag (tagId) REFERENCES tag (id)
		);
	
	END IF;
END$$

DELIMITER ;

call init_db ();

DROP PROCEDURE IF EXISTS init_db;

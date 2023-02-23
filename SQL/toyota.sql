/*
 Navicat Premium Data Transfer

 Source Server         : MI_CONEXION
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : toyota

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 01/03/2021 13:57:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for comentarios
-- ----------------------------
DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios`  (
  `id_producto` int(20) NULL DEFAULT NULL,
  `comentario` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha` date NULL DEFAULT NULL,
  `id_usuario` int(20) NULL DEFAULT NULL,
  `id_comentario` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_comentario`) USING BTREE,
  UNIQUE INDEX `id_comentario`(`id_comentario`) USING BTREE,
  INDEX `productea`(`id_producto`) USING BTREE,
  INDEX `comentan`(`id_usuario`) USING BTREE,
  CONSTRAINT `comentan` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `productea` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comentarios
-- ----------------------------
INSERT INTO `comentarios` VALUES (1, 'Auto super comodo', '2021-02-17', 1, 1);
INSERT INTO `comentarios` VALUES (1, 'Apenas me lo compre me lo robaron', '2021-02-09', 2, 2);
INSERT INTO `comentarios` VALUES (1, 'Genial encima se puede volar', '2021-02-22', 3, 3);
INSERT INTO `comentarios` VALUES (1, 'Me toco uno de transformers!!', '2021-02-11', 4, 4);
INSERT INTO `comentarios` VALUES (2, 'Me toco un DECEPTICON BOLUDO!!', '2021-02-01', 1, 5);
INSERT INTO `comentarios` VALUES (2, 'Estaba lleno de birras en el baul gracias a dios', '2021-02-04', 2, 6);
INSERT INTO `comentarios` VALUES (3, 'Me dieron un auto sin volante >:c', '2021-02-10', 3, 7);
INSERT INTO `comentarios` VALUES (3, 'A viajar!!', '2021-02-17', 4, 8);
INSERT INTO `comentarios` VALUES (4, 'Genial!', '2021-01-12', 1, 9);
INSERT INTO `comentarios` VALUES (4, 'Muy lindo <3', '2021-02-11', 2, 10);
INSERT INTO `comentarios` VALUES (5, 'Apenas me lo compre me lo robaron', '2021-02-09', 3, 11);
INSERT INTO `comentarios` VALUES (5, 'Me recibieron mi auto sin volante >:c', '2021-01-05', 4, 12);
INSERT INTO `comentarios` VALUES (6, 'Me toco un DECEPTICON !!', '2021-02-17', 1, 13);
INSERT INTO `comentarios` VALUES (7, 'Auto super comodo', '2021-02-05', 2, 14);
INSERT INTO `comentarios` VALUES (8, 'Buenisimo, anda debajo del agua', '2021-02-12', 3, 15);
INSERT INTO `comentarios` VALUES (9, 'Yo queria que volara', '2021-01-13', 4, 16);

-- ----------------------------
-- Table structure for niveles
-- ----------------------------
DROP TABLE IF EXISTS `niveles`;
CREATE TABLE `niveles`  (
  `id_nivel` int(20) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_nivel`) USING BTREE,
  UNIQUE INDEX `id_nivel_unico`(`id_nivel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of niveles
-- ----------------------------
INSERT INTO `niveles` VALUES (1, 'admi');
INSERT INTO `niveles` VALUES (2, 'usuario');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id_producto` int(20) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `modelo` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `precio` decimal(20, 0) NULL DEFAULT NULL,
  `foto` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`) USING BTREE,
  UNIQUE INDEX `id_producto_unico`(`id_producto`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 'Corolla', 'Corolla 2.0', 2514900, '1.jpg');
INSERT INTO `productos` VALUES (2, 'Corolla', 'Corolla hibrido', 3266100, '2.jpg');
INSERT INTO `productos` VALUES (3, 'Corolla ', 'Corolla 2.0 automati', 2814900, '3.jpg');
INSERT INTO `productos` VALUES (4, 'Hilux', 'Hilux 3.0 4x2', 2284300, '4.jpg');
INSERT INTO `productos` VALUES (5, 'Hilux', 'Hilux 3.0 4x4', 3276100, '5.jpg');
INSERT INTO `productos` VALUES (6, 'Hilux', 'Hilux C/X DX', 3366240, '6.jpg');
INSERT INTO `productos` VALUES (7, 'Hilux ', 'Hilux 4x4 2.4 TDI', 4266100, '7.jpg');
INSERT INTO `productos` VALUES (8, 'Land Cruiser ', 'Land Cruiser 3.0', 5266100, '8.jpg');
INSERT INTO `productos` VALUES (9, 'Hilux ', 'Hilux Limited ED', 4497200, '9.jpg');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int(20) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellido` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `clave` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_nivel` int(20) NOT NULL,
  PRIMARY KEY (`id_usuario`) USING BTREE,
  UNIQUE INDEX `id_usuario_unico`(`id_usuario`) USING BTREE,
  INDEX `nivelam`(`id_nivel`) USING BTREE,
  CONSTRAINT `nivelam` FOREIGN KEY (`id_nivel`) REFERENCES `niveles` (`id_nivel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'mari@mari.com', 'Maria', 'Eugenia', '123', 1);
INSERT INTO `usuarios` VALUES (2, 'lu@lu.com', 'Luciano', 'Tagliero', '123', 1);
INSERT INTO `usuarios` VALUES (3, 'nata@nata.com', 'Natanael', 'Gonzales', '123', 2);
INSERT INTO `usuarios` VALUES (4, 'pato@pato.com', 'Patricio', 'Velazquez', '123', 2);

SET FOREIGN_KEY_CHECKS = 1;

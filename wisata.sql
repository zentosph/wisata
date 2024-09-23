/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : wisata

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 22/09/2024 22:25:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity`  (
  `id_activity` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `activity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp,
  `delete` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_activity`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1792 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES (1540, 1, 'User Membuka Manage Menu', '2024-09-18 16:31:23', NULL);
INSERT INTO `activity` VALUES (1541, 1, 'User membuka view userlog', '2024-09-18 16:31:28', NULL);
INSERT INTO `activity` VALUES (1542, 1, 'User membuka view userlog', '2024-09-18 16:31:57', NULL);
INSERT INTO `activity` VALUES (1543, 1, 'User Membuka Data Wisata', '2024-09-18 16:37:33', NULL);
INSERT INTO `activity` VALUES (1544, 1, 'User Membuka View User', '2024-09-18 16:41:57', NULL);
INSERT INTO `activity` VALUES (1545, 1, 'User Membuka View User', '2024-09-18 16:43:46', NULL);
INSERT INTO `activity` VALUES (1546, 1, 'User Membuka Form Tambah User', '2024-09-18 16:49:19', NULL);
INSERT INTO `activity` VALUES (1547, 1, 'User Membuka Form Tambah User', '2024-09-18 16:49:32', NULL);
INSERT INTO `activity` VALUES (1548, 1, 'User Membuka Form Tambah User', '2024-09-18 16:49:52', NULL);
INSERT INTO `activity` VALUES (1549, 1, 'User Membuka Form Tambah User', '2024-09-18 16:50:33', NULL);
INSERT INTO `activity` VALUES (1550, 1, 'User Membuka Form Tambah User', '2024-09-18 16:50:41', NULL);
INSERT INTO `activity` VALUES (1551, 1, 'User Membuka Form Tambah User', '2024-09-18 16:50:50', NULL);
INSERT INTO `activity` VALUES (1552, 1, 'User Membuka Form Tambah User', '2024-09-18 16:52:15', NULL);
INSERT INTO `activity` VALUES (1553, 1, 'User Menambahkan User', '2024-09-18 16:53:26', NULL);
INSERT INTO `activity` VALUES (1554, 1, 'User Membuka View User', '2024-09-18 16:53:27', NULL);
INSERT INTO `activity` VALUES (1555, 1, 'User Membuka View User', '2024-09-18 16:54:42', NULL);
INSERT INTO `activity` VALUES (1556, 1, 'User Membuka Form Tambah User', '2024-09-18 16:54:44', NULL);
INSERT INTO `activity` VALUES (1557, 1, 'User Menambahkan User', '2024-09-18 16:54:52', NULL);
INSERT INTO `activity` VALUES (1558, 1, 'User Membuka View User', '2024-09-18 16:54:52', NULL);
INSERT INTO `activity` VALUES (1559, 1, 'User Membuka Form Tambah User', '2024-09-18 16:55:07', NULL);
INSERT INTO `activity` VALUES (1560, 1, 'User Menambahkan User', '2024-09-18 16:55:15', NULL);
INSERT INTO `activity` VALUES (1561, 1, 'User Membuka View User', '2024-09-18 16:55:16', NULL);
INSERT INTO `activity` VALUES (1562, 1, 'User Membuka View User', '2024-09-18 16:57:52', NULL);
INSERT INTO `activity` VALUES (1563, 1, 'User Membuka View User', '2024-09-18 16:58:19', NULL);
INSERT INTO `activity` VALUES (1564, 1, 'User Membuka View User', '2024-09-18 17:00:00', NULL);
INSERT INTO `activity` VALUES (1565, 1, 'User Membuka View User', '2024-09-18 17:04:07', NULL);
INSERT INTO `activity` VALUES (1566, 1, 'User Membuka View User', '2024-09-18 17:05:17', NULL);
INSERT INTO `activity` VALUES (1567, 1, 'User Membuka Detail User', '2024-09-18 17:05:23', NULL);
INSERT INTO `activity` VALUES (1568, 1, 'User Membuka Detail User', '2024-09-18 17:06:02', NULL);
INSERT INTO `activity` VALUES (1569, 1, 'User Membuka Detail User', '2024-09-18 17:06:10', NULL);
INSERT INTO `activity` VALUES (1570, 1, 'User Membuka Detail User', '2024-09-18 17:06:37', NULL);
INSERT INTO `activity` VALUES (1571, 1, 'User Membuka Detail User', '2024-09-18 17:06:48', NULL);
INSERT INTO `activity` VALUES (1572, 1, 'User Membuka Detail User', '2024-09-18 17:07:17', NULL);
INSERT INTO `activity` VALUES (1573, 1, 'User Membuka Detail User', '2024-09-18 17:07:42', NULL);
INSERT INTO `activity` VALUES (1574, 1, 'User Membuka Detail User', '2024-09-18 17:08:07', NULL);
INSERT INTO `activity` VALUES (1575, 1, 'User Membuka Detail User', '2024-09-18 17:09:02', NULL);
INSERT INTO `activity` VALUES (1576, 1, 'User Membuka Detail User', '2024-09-18 17:09:17', NULL);
INSERT INTO `activity` VALUES (1577, 1, 'User Membuka Detail User', '2024-09-18 17:09:47', NULL);
INSERT INTO `activity` VALUES (1578, 1, 'User Menambahkan User', '2024-09-18 17:09:56', NULL);
INSERT INTO `activity` VALUES (1579, 1, 'User Membuka View User', '2024-09-18 17:09:57', NULL);
INSERT INTO `activity` VALUES (1580, 1, 'User Membuka View User', '2024-09-18 17:11:33', NULL);
INSERT INTO `activity` VALUES (1581, 1, 'User Membuka Detail User', '2024-09-18 17:11:36', NULL);
INSERT INTO `activity` VALUES (1582, 1, 'User Mengedit User', '2024-09-18 17:11:39', NULL);
INSERT INTO `activity` VALUES (1583, 1, 'User Membuka Detail User', '2024-09-18 17:11:39', NULL);
INSERT INTO `activity` VALUES (1584, 1, 'User Membuka Detail User', '2024-09-18 17:11:43', NULL);
INSERT INTO `activity` VALUES (1585, 1, 'User Membuka View User', '2024-09-18 17:12:06', NULL);
INSERT INTO `activity` VALUES (1586, 1, 'User Membuka View User', '2024-09-18 17:13:23', NULL);
INSERT INTO `activity` VALUES (1587, 1, 'User Menghapus data User', '2024-09-18 17:13:24', NULL);
INSERT INTO `activity` VALUES (1588, 1, 'User Membuka View User', '2024-09-18 17:13:24', NULL);
INSERT INTO `activity` VALUES (1589, 1, 'User Membuka View User', '2024-09-18 17:38:56', NULL);
INSERT INTO `activity` VALUES (1590, 1, 'User Membuka Form Tambah User', '2024-09-18 17:40:40', NULL);
INSERT INTO `activity` VALUES (1591, 1, 'User Membuka View User', '2024-09-18 17:40:41', NULL);
INSERT INTO `activity` VALUES (1592, 1, 'User Membuka Data Wisata', '2024-09-18 17:40:44', NULL);
INSERT INTO `activity` VALUES (1593, 1, 'User Membuka Data Wisata', '2024-09-18 17:40:51', NULL);
INSERT INTO `activity` VALUES (1594, 1, 'User Membuka Data Wisata', '2024-09-18 17:42:06', NULL);
INSERT INTO `activity` VALUES (1595, 1, 'User Membuka Wisata', '2024-09-18 17:42:15', NULL);
INSERT INTO `activity` VALUES (1596, 1, 'User Membuka Dashboard', '2024-09-18 17:43:25', NULL);
INSERT INTO `activity` VALUES (1597, 1, 'User Membuka Data Wisata', '2024-09-18 17:43:31', NULL);
INSERT INTO `activity` VALUES (1598, 1, 'User Membuka Data Wisata', '2024-09-18 17:44:41', NULL);
INSERT INTO `activity` VALUES (1599, 1, 'User Menghapus data User', '2024-09-18 17:44:42', NULL);
INSERT INTO `activity` VALUES (1600, 1, 'User Membuka View User', '2024-09-18 17:44:43', NULL);
INSERT INTO `activity` VALUES (1601, 1, 'User Membuka Data Wisata', '2024-09-18 17:44:47', NULL);
INSERT INTO `activity` VALUES (1602, 1, 'User Membuka Data Wisata', '2024-09-18 17:46:14', NULL);
INSERT INTO `activity` VALUES (1603, 1, 'User Menghapus data User', '2024-09-18 17:46:16', NULL);
INSERT INTO `activity` VALUES (1604, 1, 'User Membuka Data Wisata', '2024-09-18 17:46:16', NULL);
INSERT INTO `activity` VALUES (1605, 1, 'User Membuka Data Wisata', '2024-09-18 17:52:20', NULL);
INSERT INTO `activity` VALUES (1606, 1, 'User Membuka Data Wisata', '2024-09-18 17:52:28', NULL);
INSERT INTO `activity` VALUES (1607, 1, 'User Membuka Data Wisata', '2024-09-18 17:53:06', NULL);
INSERT INTO `activity` VALUES (1608, 1, 'User Membuka View RestoreUser', '2024-09-18 17:53:14', NULL);
INSERT INTO `activity` VALUES (1609, 1, 'User Membuka Data Wisata', '2024-09-18 17:53:26', NULL);
INSERT INTO `activity` VALUES (1610, 1, 'User Membuka View User', '2024-09-18 17:53:28', NULL);
INSERT INTO `activity` VALUES (1611, 1, 'User Membuka Form Tambah User', '2024-09-18 17:53:29', NULL);
INSERT INTO `activity` VALUES (1612, 1, 'User Menambahkan User', '2024-09-18 17:53:37', NULL);
INSERT INTO `activity` VALUES (1613, 1, 'User Membuka View User', '2024-09-18 17:53:37', NULL);
INSERT INTO `activity` VALUES (1614, 1, 'User Menghapus data User', '2024-09-18 17:53:39', NULL);
INSERT INTO `activity` VALUES (1615, 1, 'User Membuka View User', '2024-09-18 17:53:40', NULL);
INSERT INTO `activity` VALUES (1616, 1, 'User Membuka View RestoreUser', '2024-09-18 17:53:42', NULL);
INSERT INTO `activity` VALUES (1617, 1, 'User Membuka View RestoreUser', '2024-09-18 17:55:07', NULL);
INSERT INTO `activity` VALUES (1618, 1, 'User Restore data User', '2024-09-18 17:55:13', NULL);
INSERT INTO `activity` VALUES (1619, 1, 'User Membuka View RestoreUser', '2024-09-18 17:55:14', NULL);
INSERT INTO `activity` VALUES (1620, 1, 'User Membuka Data Wisata', '2024-09-18 18:01:00', NULL);
INSERT INTO `activity` VALUES (1621, 1, 'User Membuka Data Wisata', '2024-09-18 18:04:42', NULL);
INSERT INTO `activity` VALUES (1622, 1, 'User Membuka Data Wisata', '2024-09-18 18:05:39', NULL);
INSERT INTO `activity` VALUES (1623, 1, 'User Restore data User', '2024-09-18 18:05:44', NULL);
INSERT INTO `activity` VALUES (1624, 1, 'User Membuka Data Wisata', '2024-09-18 18:05:44', NULL);
INSERT INTO `activity` VALUES (1625, 1, 'User Membuka Data Wisata', '2024-09-18 18:06:40', NULL);
INSERT INTO `activity` VALUES (1626, 1, 'User Membuka Data Wisata', '2024-09-18 18:06:45', NULL);
INSERT INTO `activity` VALUES (1627, 1, 'User Menghapus data User', '2024-09-18 18:06:49', NULL);
INSERT INTO `activity` VALUES (1628, 1, 'User Membuka Data Wisata', '2024-09-18 18:06:49', NULL);
INSERT INTO `activity` VALUES (1629, 1, 'User Membuka Data Wisata', '2024-09-18 18:06:52', NULL);
INSERT INTO `activity` VALUES (1630, 1, 'User Menghapus data Wisata', '2024-09-18 18:06:55', NULL);
INSERT INTO `activity` VALUES (1631, 1, 'User Membuka Data Wisata', '2024-09-18 18:06:55', NULL);
INSERT INTO `activity` VALUES (1632, 1, 'User Membuka Profile', '2024-09-18 18:12:04', NULL);
INSERT INTO `activity` VALUES (1633, 1, 'User Membuka Profile', '2024-09-18 18:14:02', NULL);
INSERT INTO `activity` VALUES (1634, 1, 'User Membuka Profile', '2024-09-18 18:16:06', NULL);
INSERT INTO `activity` VALUES (1635, 1, 'User Mengedit Profile', '2024-09-18 18:16:10', NULL);
INSERT INTO `activity` VALUES (1636, 1, 'User Membuka Profile', '2024-09-18 18:16:10', NULL);
INSERT INTO `activity` VALUES (1637, 1, 'User Membuka Profile', '2024-09-18 18:16:12', NULL);
INSERT INTO `activity` VALUES (1638, 1, 'User Mengedit Profile', '2024-09-18 18:17:24', NULL);
INSERT INTO `activity` VALUES (1639, 1, 'User Membuka Profile', '2024-09-18 18:17:24', NULL);
INSERT INTO `activity` VALUES (1640, 1, 'User Mengedit Profile', '2024-09-18 18:17:29', NULL);
INSERT INTO `activity` VALUES (1641, 1, 'User Membuka Profile', '2024-09-18 18:17:29', NULL);
INSERT INTO `activity` VALUES (1642, 1, 'User Membuka Data Wisata', '2024-09-18 18:17:35', NULL);
INSERT INTO `activity` VALUES (1643, 1, 'User Membuka View User', '2024-09-18 18:17:40', NULL);
INSERT INTO `activity` VALUES (1644, 1, 'User Membuka Detail User', '2024-09-18 18:17:53', NULL);
INSERT INTO `activity` VALUES (1645, 1, 'User Membuka View User', '2024-09-18 18:17:55', NULL);
INSERT INTO `activity` VALUES (1646, 1, 'User Membuka View User', '2024-09-18 18:20:30', NULL);
INSERT INTO `activity` VALUES (1647, 1, 'User Reset Password Ke Default', '2024-09-18 18:20:32', NULL);
INSERT INTO `activity` VALUES (1648, 1, 'User Membuka View User', '2024-09-18 18:20:32', NULL);
INSERT INTO `activity` VALUES (1649, 1, 'User Membuka View User', '2024-09-18 18:20:47', NULL);
INSERT INTO `activity` VALUES (1650, 1, 'User Membuka Form Tambah User', '2024-09-18 18:21:25', NULL);
INSERT INTO `activity` VALUES (1651, 1, 'User Membuka Wisata', '2024-09-18 18:29:57', NULL);
INSERT INTO `activity` VALUES (1652, 1, 'User Membuka Wisata', '2024-09-18 18:32:40', NULL);
INSERT INTO `activity` VALUES (1653, 1, 'User Membuka Dashboard', '2024-09-18 18:33:51', NULL);
INSERT INTO `activity` VALUES (1654, 1, 'User Membuka Wisata', '2024-09-18 18:33:53', NULL);
INSERT INTO `activity` VALUES (1655, 1, 'User Membuka Wisata', '2024-09-18 18:34:02', NULL);
INSERT INTO `activity` VALUES (1656, 1, 'User Membuka Wisata', '2024-09-18 18:38:14', NULL);
INSERT INTO `activity` VALUES (1657, 1, 'User Membuka Wisata', '2024-09-18 18:39:25', NULL);
INSERT INTO `activity` VALUES (1658, 1, 'User Membuka Wisata', '2024-09-18 18:39:41', NULL);
INSERT INTO `activity` VALUES (1659, 1, 'User Membuka Wisata', '2024-09-18 18:39:52', NULL);
INSERT INTO `activity` VALUES (1660, 1, 'User Membuka Wisata', '2024-09-18 18:40:03', NULL);
INSERT INTO `activity` VALUES (1661, 1, 'User Membuka Wisata', '2024-09-18 18:42:56', NULL);
INSERT INTO `activity` VALUES (1662, 1, 'User Membuka Wisata', '2024-09-18 18:45:08', NULL);
INSERT INTO `activity` VALUES (1663, 1, 'User Membuka Wisata', '2024-09-18 18:46:29', NULL);
INSERT INTO `activity` VALUES (1664, 1, 'User Membuka Wisata', '2024-09-18 18:48:23', NULL);
INSERT INTO `activity` VALUES (1665, 1, 'User Melakukan Login', '2024-09-18 18:50:08', NULL);
INSERT INTO `activity` VALUES (1666, 1, 'User Membuka Dashboard', '2024-09-18 18:50:09', NULL);
INSERT INTO `activity` VALUES (1667, 1, 'User Membuka Wisata', '2024-09-18 18:50:10', NULL);
INSERT INTO `activity` VALUES (1668, 1, 'User Membuka Wisata', '2024-09-18 18:50:21', NULL);
INSERT INTO `activity` VALUES (1669, 1, 'User Membuka Wisata', '2024-09-18 18:50:37', NULL);
INSERT INTO `activity` VALUES (1670, 1, 'User Membuka Wisata', '2024-09-18 18:50:54', NULL);
INSERT INTO `activity` VALUES (1671, 1, 'User Mencari lokasi', '2024-09-18 18:50:56', NULL);
INSERT INTO `activity` VALUES (1672, 1, 'User Membuka Wisata', '2024-09-18 18:51:06', NULL);
INSERT INTO `activity` VALUES (1673, 1, 'User Mencari lokasi', '2024-09-18 18:51:09', NULL);
INSERT INTO `activity` VALUES (1674, 1, 'User Membuka Wisata', '2024-09-18 18:53:03', NULL);
INSERT INTO `activity` VALUES (1675, 1, 'User Mencari lokasipulau abang', '2024-09-18 18:53:12', NULL);
INSERT INTO `activity` VALUES (1676, 1, 'User Membuka Wisata', '2024-09-18 18:53:46', NULL);
INSERT INTO `activity` VALUES (1677, 1, 'User Mencari lokasinagoya food court', '2024-09-18 18:53:52', NULL);
INSERT INTO `activity` VALUES (1678, 1, 'User Membuka Wisata', '2024-09-18 18:57:37', NULL);
INSERT INTO `activity` VALUES (1679, 1, 'User Membuka View Laporan', '2024-09-18 19:08:59', NULL);
INSERT INTO `activity` VALUES (1680, 1, 'User Membuka View Laporan', '2024-09-18 19:09:40', NULL);
INSERT INTO `activity` VALUES (1681, 1, 'User Membuka View Laporan', '2024-09-18 19:10:12', NULL);
INSERT INTO `activity` VALUES (1682, 1, 'User Membuat Laporan Pdf', '2024-09-18 19:27:17', NULL);
INSERT INTO `activity` VALUES (1683, 1, 'User Membuat Laporan Pdf', '2024-09-18 19:29:17', NULL);
INSERT INTO `activity` VALUES (1684, 1, 'User Membuat Laporan Excel', '2024-09-18 19:35:32', NULL);
INSERT INTO `activity` VALUES (1685, 1, 'User Membuat Laporan Windows', '2024-09-18 19:44:37', NULL);
INSERT INTO `activity` VALUES (1686, 1, 'User Melakukan Login', '2024-09-20 21:04:34', NULL);
INSERT INTO `activity` VALUES (1687, 1, 'User Membuka Dashboard', '2024-09-20 21:04:34', NULL);
INSERT INTO `activity` VALUES (1688, 1, 'User Membuka Setting', '2024-09-20 21:04:47', NULL);
INSERT INTO `activity` VALUES (1689, 1, 'User Mengedit Setting', '2024-09-20 21:05:02', NULL);
INSERT INTO `activity` VALUES (1690, 1, 'User Membuka Setting', '2024-09-20 21:05:02', NULL);
INSERT INTO `activity` VALUES (1691, 1, 'User Mengedit Setting', '2024-09-20 21:05:16', NULL);
INSERT INTO `activity` VALUES (1692, 1, 'User Membuka Setting', '2024-09-20 21:05:16', NULL);
INSERT INTO `activity` VALUES (1693, 1, 'User Melakukan Login', '2024-09-21 22:09:00', NULL);
INSERT INTO `activity` VALUES (1694, 1, 'User Membuka Dashboard', '2024-09-21 22:09:01', NULL);
INSERT INTO `activity` VALUES (1695, 1, 'User Membuka Manage Menu', '2024-09-21 22:09:31', NULL);
INSERT INTO `activity` VALUES (1696, 1, 'User Membuka Setting', '2024-09-21 22:09:37', NULL);
INSERT INTO `activity` VALUES (1697, 1, 'User Melakukan Login', '2024-09-21 22:17:00', NULL);
INSERT INTO `activity` VALUES (1698, 1, 'User Membuka Dashboard', '2024-09-21 22:17:01', NULL);
INSERT INTO `activity` VALUES (1699, 1, 'User Membuka Data Wisata', '2024-09-21 22:18:45', NULL);
INSERT INTO `activity` VALUES (1700, 1, 'User Membuka View User', '2024-09-21 22:19:57', NULL);
INSERT INTO `activity` VALUES (1701, 1, 'User Membuka Data Wisata', '2024-09-21 22:20:39', NULL);
INSERT INTO `activity` VALUES (1702, 1, 'User Membuka Data Wisata', '2024-09-21 22:20:43', NULL);
INSERT INTO `activity` VALUES (1703, 1, 'User Membuka Data Wisata', '2024-09-21 22:21:36', NULL);
INSERT INTO `activity` VALUES (1704, 1, 'User Membuka Data Wisata', '2024-09-21 22:21:44', NULL);
INSERT INTO `activity` VALUES (1705, 1, 'User Membuka Form Tambah Wisata', '2024-09-21 22:22:27', NULL);
INSERT INTO `activity` VALUES (1706, 1, 'User Membuka View User', '2024-09-21 22:25:36', NULL);
INSERT INTO `activity` VALUES (1707, 1, 'User Membuka Form Tambah User', '2024-09-21 22:25:38', NULL);
INSERT INTO `activity` VALUES (1708, 1, 'User Membuka Data Wisata', '2024-09-21 22:26:16', NULL);
INSERT INTO `activity` VALUES (1709, 1, 'User Membuka Wisata', '2024-09-21 22:26:45', NULL);
INSERT INTO `activity` VALUES (1710, 1, 'User Membuka Data Wisata', '2024-09-21 22:26:52', NULL);
INSERT INTO `activity` VALUES (1711, 1, 'User Membuka View User', '2024-09-21 22:28:05', NULL);
INSERT INTO `activity` VALUES (1712, 1, 'User Membuka Detail User', '2024-09-21 22:28:08', NULL);
INSERT INTO `activity` VALUES (1713, 1, 'User Mengedit User', '2024-09-21 22:28:19', NULL);
INSERT INTO `activity` VALUES (1714, 1, 'User Membuka Detail User', '2024-09-21 22:28:19', NULL);
INSERT INTO `activity` VALUES (1715, 1, 'User Membuka View Laporan', '2024-09-21 22:31:27', NULL);
INSERT INTO `activity` VALUES (1716, 1, 'User Membuka View Laporan', '2024-09-21 22:31:42', NULL);
INSERT INTO `activity` VALUES (1717, 1, 'User Membuat Laporan Pdf', '2024-09-21 22:32:32', NULL);
INSERT INTO `activity` VALUES (1718, 1, 'User Membuat Laporan Excel', '2024-09-21 22:33:49', NULL);
INSERT INTO `activity` VALUES (1719, 1, 'User Membuat Laporan Windows', '2024-09-21 22:34:29', NULL);
INSERT INTO `activity` VALUES (1720, 1, 'User Membuka Wisata', '2024-09-21 22:43:44', NULL);
INSERT INTO `activity` VALUES (1721, 1, 'User Mencari lokasipulau abang', '2024-09-21 22:43:48', NULL);
INSERT INTO `activity` VALUES (1722, 1, 'User Membuka Data Wisata', '2024-09-21 22:44:03', NULL);
INSERT INTO `activity` VALUES (1723, 1, 'User Membuka View Laporan', '2024-09-21 22:44:07', NULL);
INSERT INTO `activity` VALUES (1724, 1, 'User Melakukan Login', '2024-09-22 21:54:15', NULL);
INSERT INTO `activity` VALUES (1725, 1, 'User Membuka Dashboard', '2024-09-22 21:54:16', NULL);
INSERT INTO `activity` VALUES (1726, 1, 'User Membuka View Laporan', '2024-09-22 21:54:20', NULL);
INSERT INTO `activity` VALUES (1727, 1, 'User Membuka View Laporan', '2024-09-22 21:54:49', NULL);
INSERT INTO `activity` VALUES (1728, 1, 'User Membuka View Laporan', '2024-09-22 21:55:26', NULL);
INSERT INTO `activity` VALUES (1729, 1, 'User Membuka View Laporan', '2024-09-22 21:55:31', NULL);
INSERT INTO `activity` VALUES (1730, 1, 'User Membuka View Laporan', '2024-09-22 21:55:41', NULL);
INSERT INTO `activity` VALUES (1731, 1, 'User Membuka View Laporan', '2024-09-22 21:55:48', NULL);
INSERT INTO `activity` VALUES (1732, 1, 'User Membuka View Laporan', '2024-09-22 21:55:50', NULL);
INSERT INTO `activity` VALUES (1733, 5, 'User Melakukan Login', '2024-09-22 21:56:23', NULL);
INSERT INTO `activity` VALUES (1734, 5, 'User Membuka Dashboard', '2024-09-22 21:56:24', NULL);
INSERT INTO `activity` VALUES (1735, 5, 'User Membuka Manage Menu', '2024-09-22 21:56:51', NULL);
INSERT INTO `activity` VALUES (1736, 5, 'User Membuka Manage Menu', '2024-09-22 21:56:52', NULL);
INSERT INTO `activity` VALUES (1737, 5, 'User Membuka Setting', '2024-09-22 21:56:52', NULL);
INSERT INTO `activity` VALUES (1738, 5, 'User Membuka Setting', '2024-09-22 21:56:52', NULL);
INSERT INTO `activity` VALUES (1739, 5, 'User Membuka Setting', '2024-09-22 21:56:53', NULL);
INSERT INTO `activity` VALUES (1740, 5, 'User Membuka Dashboard', '2024-09-22 21:56:55', NULL);
INSERT INTO `activity` VALUES (1741, 5, 'User Membuka Dashboard', '2024-09-22 21:57:02', NULL);
INSERT INTO `activity` VALUES (1742, 5, 'User Membuka Dashboard', '2024-09-22 21:57:04', NULL);
INSERT INTO `activity` VALUES (1743, 5, 'User Membuka Dashboard', '2024-09-22 21:57:07', NULL);
INSERT INTO `activity` VALUES (1744, 5, 'User Melakukan Login', '2024-09-22 21:57:18', NULL);
INSERT INTO `activity` VALUES (1745, 5, 'User Membuka Dashboard', '2024-09-22 21:57:18', NULL);
INSERT INTO `activity` VALUES (1746, 5, 'User Melakukan Login', '2024-09-22 21:58:09', NULL);
INSERT INTO `activity` VALUES (1747, 5, 'User Membuka Dashboard', '2024-09-22 21:58:09', NULL);
INSERT INTO `activity` VALUES (1748, 5, 'User Membuka Dashboard', '2024-09-22 21:58:16', NULL);
INSERT INTO `activity` VALUES (1749, 5, 'User Membuka Dashboard', '2024-09-22 21:58:23', NULL);
INSERT INTO `activity` VALUES (1750, 5, 'User Membuka Wisata', '2024-09-22 21:58:30', NULL);
INSERT INTO `activity` VALUES (1751, 5, 'User Membuka Wisata', '2024-09-22 21:58:43', NULL);
INSERT INTO `activity` VALUES (1752, 5, 'User Mencari lokasitarempa', '2024-09-22 21:58:50', NULL);
INSERT INTO `activity` VALUES (1753, 5, 'User Mencari lokasiNagoya foodcourt.', '2024-09-22 21:59:11', NULL);
INSERT INTO `activity` VALUES (1754, 5, 'User Mencari lokasiTak rempa.', '2024-09-22 21:59:18', NULL);
INSERT INTO `activity` VALUES (1755, 5, 'User Mencari lokasiNtar tarempa.', '2024-09-22 21:59:23', NULL);
INSERT INTO `activity` VALUES (1756, 5, 'User Mencari lokasiNagoya food court.', '2024-09-22 21:59:33', NULL);
INSERT INTO `activity` VALUES (1757, 5, 'User Mencari lokasiNagoya food court', '2024-09-22 21:59:38', NULL);
INSERT INTO `activity` VALUES (1758, 5, 'User Membuka Dashboard', '2024-09-22 21:59:45', NULL);
INSERT INTO `activity` VALUES (1759, 1, 'User Melakukan Login', '2024-09-22 21:59:59', NULL);
INSERT INTO `activity` VALUES (1760, 1, 'User Membuka Dashboard', '2024-09-22 22:00:00', NULL);
INSERT INTO `activity` VALUES (1761, 1, 'User Membuka Data Wisata', '2024-09-22 22:00:10', NULL);
INSERT INTO `activity` VALUES (1762, 1, 'User Menghapus data User', '2024-09-22 22:00:21', NULL);
INSERT INTO `activity` VALUES (1763, 1, 'User Membuka Data Wisata', '2024-09-22 22:00:21', NULL);
INSERT INTO `activity` VALUES (1764, 1, 'User Membuka Data Wisata', '2024-09-22 22:00:28', NULL);
INSERT INTO `activity` VALUES (1765, 1, 'User Restore data User', '2024-09-22 22:00:32', NULL);
INSERT INTO `activity` VALUES (1766, 1, 'User Membuka Data Wisata', '2024-09-22 22:00:33', NULL);
INSERT INTO `activity` VALUES (1767, 1, 'User Membuka View User', '2024-09-22 22:00:38', NULL);
INSERT INTO `activity` VALUES (1768, 1, 'User Membuka Detail User', '2024-09-22 22:00:45', NULL);
INSERT INTO `activity` VALUES (1769, 1, 'User Membuka Data Wisata', '2024-09-22 22:00:50', NULL);
INSERT INTO `activity` VALUES (1770, 1, 'User Membuka Form Tambah Wisata', '2024-09-22 22:00:55', NULL);
INSERT INTO `activity` VALUES (1771, 1, 'User Menambahkan Wisata', '2024-09-22 22:01:30', NULL);
INSERT INTO `activity` VALUES (1772, 1, 'User Membuka Form Tambah Wisata', '2024-09-22 22:01:31', NULL);
INSERT INTO `activity` VALUES (1773, 1, 'User Membuka Wisata', '2024-09-22 22:01:35', NULL);
INSERT INTO `activity` VALUES (1774, 1, 'User Mencari lokasihotel baloi garden', '2024-09-22 22:01:43', NULL);
INSERT INTO `activity` VALUES (1775, 1, 'User Membuka View RestoreUser', '2024-09-22 22:01:54', NULL);
INSERT INTO `activity` VALUES (1776, 1, 'User Membuka View Laporan', '2024-09-22 22:01:56', NULL);
INSERT INTO `activity` VALUES (1777, 1, 'User Membuka View User', '2024-09-22 22:01:59', NULL);
INSERT INTO `activity` VALUES (1778, 1, 'User Membuka Profile', '2024-09-22 22:02:03', NULL);
INSERT INTO `activity` VALUES (1779, 1, 'User Membuka View Laporan', '2024-09-22 22:02:09', NULL);
INSERT INTO `activity` VALUES (1780, 1, 'User Membuat Laporan Pdf', '2024-09-22 22:02:46', NULL);
INSERT INTO `activity` VALUES (1781, 1, 'User Membuat Laporan Excel', '2024-09-22 22:02:54', NULL);
INSERT INTO `activity` VALUES (1782, 1, 'User Membuat Laporan Windows', '2024-09-22 22:03:09', NULL);
INSERT INTO `activity` VALUES (1783, 1, 'User Membuka Setting', '2024-09-22 22:03:23', NULL);
INSERT INTO `activity` VALUES (1784, 1, 'User Membuka Manage Menu', '2024-09-22 22:03:41', NULL);
INSERT INTO `activity` VALUES (1785, 1, 'User membuka view userlog', '2024-09-22 22:03:53', NULL);
INSERT INTO `activity` VALUES (1786, 1, 'User Membuka Setting', '2024-09-22 22:04:20', NULL);
INSERT INTO `activity` VALUES (1787, 1, 'User Mengedit Setting', '2024-09-22 22:04:28', NULL);
INSERT INTO `activity` VALUES (1788, 1, 'User Membuka Setting', '2024-09-22 22:04:29', NULL);
INSERT INTO `activity` VALUES (1789, 1, 'User Mengedit Setting', '2024-09-22 22:04:36', NULL);
INSERT INTO `activity` VALUES (1790, 1, 'User Membuka Setting', '2024-09-22 22:04:37', NULL);
INSERT INTO `activity` VALUES (1791, 1, 'User Membuka Dashboard', '2024-09-22 22:04:39', NULL);

-- ----------------------------
-- Table structure for history
-- ----------------------------
DROP TABLE IF EXISTS `history`;
CREATE TABLE `history`  (
  `id_history` int NOT NULL AUTO_INCREMENT,
  `id_user` int NULL DEFAULT NULL,
  `search` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `create_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_history`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of history
-- ----------------------------
INSERT INTO `history` VALUES (7, 1, 'User Mencari lokasi nagoya food court', '2024-09-18 18:53:52', 1);
INSERT INTO `history` VALUES (8, 1, 'User Mencari lokasi pulau abang', '2024-09-21 22:43:48', 1);
INSERT INTO `history` VALUES (9, 5, 'User Mencari lokasi tarempa', '2024-09-22 21:58:50', 5);
INSERT INTO `history` VALUES (10, 5, 'User Mencari lokasi Nagoya foodcourt.', '2024-09-22 21:59:11', 5);
INSERT INTO `history` VALUES (11, 5, 'User Mencari lokasi Tak rempa.', '2024-09-22 21:59:18', 5);
INSERT INTO `history` VALUES (12, 5, 'User Mencari lokasi Ntar tarempa.', '2024-09-22 21:59:23', 5);
INSERT INTO `history` VALUES (13, 5, 'User Mencari lokasi Nagoya food court.', '2024-09-22 21:59:33', 5);
INSERT INTO `history` VALUES (14, 5, 'User Mencari lokasi Nagoya food court', '2024-09-22 21:59:38', 5);
INSERT INTO `history` VALUES (15, 1, 'User Mencari lokasi hotel baloi garden', '2024-09-22 22:01:43', 1);

-- ----------------------------
-- Table structure for level
-- ----------------------------
DROP TABLE IF EXISTS `level`;
CREATE TABLE `level`  (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_level`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of level
-- ----------------------------
INSERT INTO `level` VALUES (1, 'Admin');
INSERT INTO `level` VALUES (2, 'Manage Wisata');
INSERT INTO `level` VALUES (3, 'User');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `level` int NULL DEFAULT NULL,
  `dashboard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `wisata` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 1, '1', '1', '1', '1');
INSERT INTO `menu` VALUES (2, 2, '1', '0', '0', '1');
INSERT INTO `menu` VALUES (3, 3, '1', '0', '0', '1');
INSERT INTO `menu` VALUES (4, 4, '1', '0', '0', '1');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `judul_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tab_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `menu_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_setting`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (1, 'Wisata Kota Batam!!', 'icon.png', 'icons8-wind-48.png', NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `id_level` int NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delete` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'wisata-batam-1024x679.jpg', NULL, '2024-09-21 22:28:19', 1);
INSERT INTO `user` VALUES (5, 2, 'leonardo', 'c4ca4238a0b923820dcc509a6f75849b', 'icons8-wind-70.png', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for wisata_batam
-- ----------------------------
DROP TABLE IF EXISTS `wisata_batam`;
CREATE TABLE `wisata_batam`  (
  `id_wisata` int NOT NULL AUTO_INCREMENT,
  `nama_objek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `desa_kelurahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `latitude` decimal(10, 7) NULL DEFAULT NULL,
  `longitude` decimal(10, 7) NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `delete` datetime NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `create_by` int NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_wisata`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of wisata_batam
-- ----------------------------
INSERT INTO `wisata_batam` VALUES (1, 'Pulau Abang', 'Galang', 'Galang', 'Wisata Bahari', 0.5639441, 103.9883415, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (2, 'Pantai Melur', 'Galang', 'Galang', 'Wisata Bahari', 0.7576537, 104.1494519, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (3, 'Pantai Nongsa', 'Sambau', 'Nongsa', 'Wisata Bahari', 1.1757000, 104.0459000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (4, 'Pantai Tanjung Memban', 'Batu Besar', 'Nongsa', 'Wisata Bahari', 1.1248000, 104.0842000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (6, 'Pantai Mirota', 'Galang', 'Galang', 'Wisata Bahari', 0.8658000, 104.0653000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (7, 'Pantai Setokok', 'Bulang', 'Galang', 'Wisata Bahari', 0.8629000, 104.0703000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (8, 'Pantai Vio-Vio', 'Desa Sijantung', 'Galang', 'Wisata Bahari', 0.8765000, 104.0814000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (9, 'Pantai Semandor', 'Sembulang', 'Galang', 'Wisata Bahari', 0.8857000, 104.0857000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (10, 'Pantai Tanjung Pinggir', 'Tanjung Pinggir', 'Sekupang', 'Wisata Bahari', 1.0795000, 104.0147000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (11, 'Turi Beach Resort', 'Nongsa', 'Nongsa', 'Wisata Bahari', 1.1763000, 104.0467000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (12, 'Montigo Resort', 'Nongsa', 'Nongsa', 'Wisata Bahari', 1.1763000, 104.0467000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (13, 'Pantai Bale-Bale', 'Sambau', 'Nongsa', 'Wisata Bahari', 1.1643000, 104.0465000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (14, 'Pulau Petong', 'Galang', 'Galang', 'Wisata Bahari', 0.8490000, 104.1914000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (15, 'Pulau Mabud Darat', 'Karas', 'Galang', 'Wisata Bahari', 0.8445000, 104.2046000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (16, 'Pantai Payung', 'Batu Besar', 'Nongsa', 'Wisata Bahari', 1.1237000, 104.0894000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (17, 'Pantai Kampung Panau', 'Kampung Kabil', 'Nongsa', 'Wisata Bahari', 1.1361000, 104.1023000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (18, 'Pantai Cakang', 'Galang Baru', 'Galang', 'Wisata Bahari', 0.8743000, 104.0633000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (19, 'Mega Wisata Okarina', 'Batam Centre', 'Batam Kota', 'Wisata Bahari', 1.1102000, 104.0457000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (20, 'Pulau Puteri', 'Nongsa', 'Nongsa', 'Wisata Bahari', 1.1525000, 104.0873000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (21, 'Pantai Melayu', 'Nongsa', 'Nongsa', 'Wisata Bahari', 1.1156000, 104.0654000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (22, 'Pantai Terih', 'Nongsa', 'Nongsa', 'Wisata Bahari', 1.1164000, 104.0654000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (23, 'Pandang Tak Jemu', 'Sambau', 'Nongsa', 'Wisata Bahari', 1.1182000, 104.0713000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (24, 'Pantai Mak Dara', 'Batu Besar', 'Nongsa', 'Wisata Bahari', 1.1198000, 104.0734000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (25, 'Kampung Melayu', 'Batu Besar', 'Nongsa', 'Wisata Bahari', 1.1201000, 104.0739000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (26, 'Pantai Teluk Mata Ikan', 'Sambau', 'Nongsa', 'Wisata Bahari', 1.1211000, 104.0761000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (27, 'Pantai Gorap', 'Batu Besar', 'Nongsa', 'Wisata Bahari', 1.1222000, 104.0783000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (28, 'Pantai Sekilak', 'Batu Besar', 'Nongsa', 'Wisata Bahari', 1.1240000, 104.0814000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (29, 'Pantai Melayu', 'Galang', 'Galang', 'Wisata Bahari', 0.8792000, 104.1873000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (30, 'Pantai Elyorita', 'Galang', 'Galang', 'Wisata Bahari', 0.8845000, 104.1887000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (31, 'Pulau Hantu', 'Galang', 'Galang', 'Wisata Bahari', 0.8875000, 104.1912000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (32, 'Pulau Ranoh', 'Galang', 'Galang', 'Wisata Bahari', 0.8905000, 104.1938000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (33, 'Pulau Karas', 'Karas', 'Galang', 'Wisata Bahari', 0.8946000, 104.1953000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (34, 'Permata Subang Mas', 'Galang', 'Galang', 'Wisata Bahari', 0.8990000, 104.1982000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (35, 'Kepri Coral', 'Galang', 'Galang', 'Wisata Bahari', 0.9035000, 104.2014000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (36, 'Pantai Tanjung Penarik', 'Dendang Melayu', 'Sagulung', 'Wisata Bahari', 1.0657000, 104.0182000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (37, 'Pantai Tanjung Datuk', 'Tanjung Pinggir', 'Sekupang', 'Wisata Bahari', 1.0795000, 104.0147000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (38, 'Elang-Elang Laut', 'Belakang Padang', 'Belakang Padang', 'Wisata Bahari', 1.1167000, 103.9117000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (39, 'Melawa', 'Sekanakraya', 'Belakang Padang', 'Wisata Bahari', 1.1200000, 103.9135000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (40, 'Pasir Putih', 'Kampung Began', 'Sei Beduk', 'Wisata Bahari', 1.0854000, 104.0832000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (41, 'Pantai Tanjung Buntung', 'Bengkong Laut', 'Bengkong', 'Wisata Bahari', 1.1062000, 104.0635000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (42, 'Pantai Tanjung Uma', 'Tanjung Uma', 'Batu Ampar', 'Wisata Bahari', 1.1145000, 104.0453000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (43, 'Mesjid Agung Batam Centre', 'Batam Centre', 'Batam Kota', 'Wisata Religi', 1.1061000, 104.0372000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (44, 'Vihara Maha Duta Materya', 'Batam Kota', 'Batam Kota', 'Wisata Religi', 1.1075000, 104.0272000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (45, 'Gereja Tabga', 'Batam Centre', 'Batam Kota', 'Wisata Religi', 1.1076000, 104.0305000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (46, 'Vihara Quan Am Tu', 'Sijantung', 'Galang', 'Wisata Religi', 0.8658000, 104.0653000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (47, 'Vihara Mulia Dharma', 'Sembulang', 'Galang', 'Wisata Religi', 0.8765000, 104.0814000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (48, 'Guan Yin', 'Sijantung', 'Galang', 'Wisata Religi', 0.8743000, 104.0633000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (49, 'Immaculate Conception Mary Church', 'Sijantung', 'Galang', 'Wisata Religi', 0.8725000, 104.0678000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (50, 'Pa Auk Vipassana Dhuta Hermitage', NULL, 'Galang', 'Wisata Religi', 0.8690000, 104.0692000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (51, 'Masjid Raya Baiturrahman', 'Sekupang', 'Sekupang', 'Wisata Religi', 1.1114000, 104.0154000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (52, 'Vihara Duta Mahayana', 'Sekupang', 'Sekupang', 'Wisata Religi', 1.1133000, 104.0178000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (53, 'Patung Dewi Kwan Im', 'Sekupang', 'Sekupang', 'Wisata Religi', 1.1147000, 104.0192000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (54, 'Pura Agung Ametha Buana', 'Sekupang', 'Sekupang', 'Wisata Religi', 1.1167000, 104.0211000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (55, 'Masjid Agung Sultan Riayath Syah', 'Batu Aji', 'Batu Aji', 'Wisata Religi', 1.0732000, 104.0275000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (56, 'Klenteng Cetya Tridarma', 'Lubuk Baja', 'Lubuk Baja', 'Wisata Religi', 1.1292000, 104.0453000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (57, 'Masjid Arafah', 'Lubuk Baja', 'Lubuk Baja', 'Wisata Religi', 1.1317000, 104.0485000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (58, 'Masjid Cheng Ho', 'Tanjung Buntung', 'Bengkong', 'Wisata Religi', 1.1062000, 104.0635000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (59, 'Masjid Baitusyukur', 'Sungai Jodoh', 'Batu Ampar', 'Wisata Religi', 1.1357000, 104.0514000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (60, 'GBI Emmanuel Batam', 'Seraya', 'Batu Ampar', 'Wisata Religi', 1.1385000, 104.0543000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (61, 'Restoran Tarempa', 'Teluk Tering', 'Batam Kota', 'Wisata Kuliner', 1.1245000, 104.0378000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (62, 'Rumah Kopi Fatmawati', 'Batam Kota', 'Batam Kota', 'Wisata Kuliner', 1.1247000, 104.0379000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (63, 'Rumah Makan Yong Kee', 'Batam Kota', 'Batam Kota', 'Wisata Kuliner', 1.1083000, 104.0382000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (64, 'The Sampan Seafood and BBQ', 'Teluk Tering', 'Batam Kota', 'Wisata Kuliner', 1.1257000, 104.0385000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (65, 'Nagoya Hill Food Street', 'Lubuk Baja', 'Batam Kota', 'Wisata Kuliner', 1.1302000, 104.0483000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (66, 'Butik Kuliner', 'Batam Kota', 'Batam Kota', 'Wisata Kuliner', 1.1234000, 104.0377000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (67, 'My Garden Restaurant', 'Belian', 'Batam Kota', 'Wisata Kuliner', 1.1267000, 104.0412000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (68, 'Sei Enam Seafood', 'Batam Kota', 'Batam Kota', 'Wisata Kuliner', 1.1248000, 104.0392000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (69, 'Welcome To Batam', 'Batam Kota', 'Batam Kota', 'Wisata Kuliner', 1.1295000, 104.0465000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (70, 'City Work Food Court', 'Batam Kota', 'Batam Kota', 'Wisata Kuliner', 1.1255000, 104.0411000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (71, 'Golden Prawn', 'Tg. Buntung', 'Bengkong', 'Wisata Kuliner', 1.1062000, 104.0635000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (72, 'Pasir Putih Pujasera', 'Bengkong', 'Bengkong', 'Wisata Kuliner', 1.1093000, 104.0657000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (73, 'Harbour Bay Food Court', 'Sungai Jodoh', 'Batu Ampar', 'Wisata Kuliner', 1.1357000, 104.0514000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (74, 'Ikan Bakar Pak NDut', 'Sungai Jodoh', 'Batu Ampar', 'Wisata Kuliner', 1.1361000, 104.0525000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (75, 'Restoran Pondok Batam Kuring', 'Sungai Jodoh', 'Batu Ampar', 'Wisata Kuliner', 1.1364000, 104.0528000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (76, 'Kampung Bule', 'Sungai Jodoh', 'Batu Ampar', 'Wisata Kuliner', 1.1367000, 104.0531000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (77, 'Nagoya Hill Food Court', 'Lubuk Baja', 'Lubuk Baja', 'Wisata Kuliner', 1.1292000, 104.0453000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (78, 'Yongki Soup Ikan', 'Lubuk Baja', 'Lubuk Baja', 'Wisata Kuliner', 1.1303000, 104.0484000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (79, 'Nagoya Food Court', 'Lubuk Baja', 'Lubuk Baja', 'Wisata Kuliner', 1.1305000, 104.0486000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (80, 'Pojok Kuliner Nagoya Mantion', 'Lubuk Baja', 'Lubuk Baja', 'Wisata Kuliner', 1.1307000, 104.0489000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (81, 'Rezeki Seafood', 'Batu Besar', 'Nongsa', 'Wisata Kuliner', 1.1210000, 104.0710000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (82, 'Lesehan Mitra Mall', 'Bukit Tempayan', 'Batu Aji', 'Wisata Kuliner', 1.0725000, 104.0178000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (83, 'Fatimah Kuliner', 'Bukit Tempayan', 'Batu Aji', 'Wisata Kuliner', 1.0732000, 104.0183000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (84, 'Rasa Resto', 'Buliang', 'Batu Aji', 'Wisata Kuliner', 1.0740000, 104.0190000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (85, 'Barelang Seafood Resto', 'Tembesi', 'Sagulung', 'Wisata Kuliner', 1.0661000, 104.0188000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (86, 'Tiban Centre', 'Tiban Indah', 'Sekupang', 'Wisata Kuliner', 1.1125000, 104.0144000, 'barelang.jpeg', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wisata_batam` VALUES (87, 'hotel baloi garden', NULL, NULL, NULL, 1.1237790, 104.0063540, NULL, NULL, '2024-09-22 22:01:30', 1, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;

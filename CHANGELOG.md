Yii2 Admin Change Log
==========================

1.0.0-rc under development
--------------------------

- Chg #10: `cache` is not used anymore (mdmunir).
- Chg #11: Only use required style sheet (mdmunir).
- Bug #12: Allow another module name (mdmunir).
- Chg: Using `VarDumper::export` to save `data` of `mdm\models\AuthItem` (mdmunir).
- Chg: Allow using another `yii\rbac\Rule` instance (mdmunir).
- Add: Custom side menu via `mdm\admin\Module::items` (mdmunir).
- Add: Added menu manager (mdmunir).
- Add: Migration for table menu (mdmunir).
- Chg: Remove prefix `menu_` from column name of table `menu` (mdmunir).
- Chg: Added column `data` to table `menu` (mdmunir).
- Chg: Can customize return of `mdm\admin\components\AccessHelper::getAssignedMenu()` with provide a callback to method (mdmunir). 
- Add: Added Menu order (mdmunir).
- Chg: Add require "yiisoft/yii2-jui" to composer.json (mdmunir, hashie5).
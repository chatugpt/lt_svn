@echo off
echo 确定执行删除图片操作？
pause

echo 删除类别图片
del /q/a/f/s images\categories\*.*
echo 成功

echo 删除商品大图
del /q/a/f/s images\v\*.*
echo 成功

echo 删除商品中图
del /q/a/f/s images\l\*.*
echo 成功

echo 删除商品小图
del /q/a/f/s images\s\*.*
echo 成功

pause
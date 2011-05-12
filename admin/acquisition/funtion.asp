<%
'电话号码过滤,变成不重复
Function str_filter(str_str)

Dim arr, i, tmp_str
If Len(str_str) = 0 Then Exit Function
arr = Split(str_str, ",")

For i = 0 To UBound(arr)
   If in_Arr(arr(i), tmp_str) = False Then
        tmp_str = tmp_str & arr(i) & ","
   End If
Next



If Len(tmp_str) > 0 Then
    str_filter = Left(tmp_str, Len(tmp_str) - 1)
End If

End Function

'是否在数组里面

Function in_Arr(str, tmp_str)
    Dim tmp_arr, i
    
    If Len(tmp_str) = 0 Then in_Arr = False
    
    tmp_arr = Split(tmp_str, ",")
    
    For i = 0 To UBound(tmp_arr)
        If CStr(str) = CStr(tmp_arr(i)) Then
            in_Arr = True
            Exit Function
        End If
    
    Next
    
    in_Arr = False

End Function

%>
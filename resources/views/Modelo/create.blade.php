 @ e x t e n d s ( ' l a y o u t s . m a s t e r ' )  
 @ s e c t i o n ( ' c o n t e n t ' )  
         < d i v   c l a s s = " c o n t a i n e r - f l u i d " >  
                 < h 1 > A d i c i o n a r   u m   n o v o   m o d e l o   d e   C a r r o s . . . < / h 1 >  
                 < p   c l a s s = " l e a d " > I n s i r a   t o d a   a   i n f o r m a � � o   s o b r e   o   m o d e l o . < / p >  
                 < h r >  
                 < f o r m   a c t i o n = " { {   r o u t e ( ' m o d e l o . s t o r e ' ) } } "   m e t h o d = " P O S T " >  
                         < d i v   c l a s s = " f o r m - g r o u p " >  
                                 < l a b e l   f o r = " n o m e "   c l a s s = " c o n t r o l - l a b e l " > N o m e : < / l a b e l >  
                                 < i n p u t   t y p e = " t e x t "   i d = " n o m e "   n a m e = " n o m e "   c l a s s = " f o r m - c o n t r o l "   r e q u i r e d >  
                         < / d i v >  
  
                         < d i v   c l a s s = " f o r m - g r o u p " >  
                                 < l a b e l   f o r = " c o m b u s t i v e l "   c l a s s = " c o n t r o l - l a b e l " > C o m b u s t i v e l : < / l a b e l >  
                                 < i n p u t   i d = " c o m b u s t i v e l "   n a m e = " c o m b u s t i v e l "   c l a s s = " f o r m - c o n t r o l "   r e q u i r e d >  
                         < / d i v >  
  
                         < d i v   c l a s s = " f o r m - g r o u p " >  
                                 < l a b e l   f o r = " n u m _ l u g a r e s "   c l a s s = " c o n t r o l - l a b e l " > N � m e r o   d e   L u g a r e s : < / l a b e l >  
                                 < i n p u t   i d = " n u m _ l u g a r e s "   n a m e = " n u m _ l u g a r e s "   c l a s s = " f o r m - c o n t r o l "   r e q u i r e d >  
                         < / d i v >  
  
                         < d i v   c l a s s = " f o r m - g r o u p " >  
                                 < l a b e l   f o r = " a n o _ c o n s t r u c a o "   c l a s s = " c o n t r o l - l a b e l " > A n o   d e   c o n s t r u � � o : < / l a b e l >  
                                 < i n p u t   t y p e = " t e x t "   i d = " a n o _ c o n s t r u c a o "   n a m e = " a n o _ c o n s t r u c a o "   c l a s s = " f o r m - c o n t r o l "   r e q u i r e d >  
                         < / d i v >  
  
                         < i n p u t   t y p e = " s u b m i t "   v a l u e = " I n s e r i r   n o v o   M o d e l o "   c l a s s = " b t n   b t n - p r i m a r y " >  
                         < i n p u t   t y p e = " h i d d e n "   n a m e = " _ t o k e n "   v a l u e = " { {   c s r f _ t o k e n ( )   } } " >  
                 < / f o r m >  
         < / d i v >  
 @ e n d s e c t i o n
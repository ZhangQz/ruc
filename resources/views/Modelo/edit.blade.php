 @ e x t e n d s ( ' l a y o u t s . m a s t e r ' )  
 @ s e c t i o n ( ' c o n t e n t ' )  
 	 < d i v   c l a s s = " c o n t a i n e r - f l u i d " >  
 	 	 < h 1 > E d i t a r   M o d e l o   " { {   $ m o d e l o - > n o m e   } } " < / h 1 >  
 	 	 < p   c l a s s = " l e a d " > E d i t e   a   i n f o r m a � � o   p r e t e n d i d a   e   c a r r e g u e   n o   b o t � o   g u a r d a r . < / p >  
 	 	 < h r >  
 	 	 < f o r m   a c t i o n = " { {   r o u t e ( ' m o d e l o . u p d a t e ' ,   $ m o d e l o - > i d M o d e l o ) } } "   m e t h o d = " P O S T " >  
 	 	 	 < i n p u t   t y p e = " h i d d e n "   n a m e = " _ m e t h o d "   v a l u e = " P U T " >  
 	 	 	 < d i v   c l a s s = " f o r m - g r o u p " >  
 	 	 	 	 < l a b e l   f o r = " n o m e "   c l a s s = " c o n t r o l - l a b e l " > N o m e : < / l a b e l >  
 	 	 	 	 < i n p u t   t y p e = " t e x t "   i d = " n o m e "   n a m e = " n o m e "   c l a s s = " f o r m - c o n t r o l "   v a l u e = " { {   $ m o d e l o - > n o m e   } } "   r e q u i r e d >  
 	 	 	 < / d i v >  
  
 	 	 	 < d i v   c l a s s = " f o r m - g r o u p " >  
 	 	 	 	 < l a b e l   f o r = " c o m b u s t i v e l "   c l a s s = " c o n t r o l - l a b e l " > C o m b u s t � v e l : < / l a b e l >  
 	 	 	 	 < i n p u t   t y p e = " t e x t "   i d = " c o m b u s t i v e l "   n a m e = " c o m b u s t i v e l "   c l a s s = " f o r m - c o n t r o l "   v a l u e = " { {   $ m o d e l o - > c o m b u s t i v e l   } } " >  
 	 	 	 < / d i v >  
  
 	 	 	 < d i v   c l a s s = " f o r m - g r o u p " >  
 	 	 	 	 < l a b e l   f o r = " n u m _ l u g a r e s "   c l a s s = " c o n t r o l - l a b e l " > N �   d e   L u g a r e s : < / l a b e l >  
 	 	 	 	 < i n p u t   t y p e = " t e x t "   i d = " n u m _ l u g a r e s "   n a m e = " n u m _ l u g a r e s "   c l a s s = " f o r m - c o n t r o l "   v a l u e = " { {   $ m o d e l o - > n u m _ l u g a r e s   } } " >  
 	 	 	 < / d i v >  
  
 	 	 	 < d i v   c l a s s = " f o r m - g r o u p " >  
 	 	 	 	 < l a b e l   f o r = " a n o _ c o n s t r u c a o "   c l a s s = " c o n t r o l - l a b e l " > A n o   d e   c o n s t r u � � o : < / l a b e l >  
 	 	 	 	 < i n p u t   t y p e = " t e x t "   i d = " a n o _ c o n s t r u c a o "   n a m e = " a n o _ c o n s t r u c a o "   c l a s s = " f o r m - c o n t r o l "   v a l u e = " { {   $ m o d e l o - > a n o _ c o n s t r u c a o   } } " >  
 	 	 	 < / d i v >  
  
 	 	 	 < i n p u t   t y p e = " s u b m i t "   v a l u e = " G u a r d a r "   c l a s s = " b t n   b t n - p r i m a r y " >  
 	 	 	 < i n p u t   t y p e = " h i d d e n "   n a m e = " _ t o k e n "   v a l u e = " { {   c s r f _ t o k e n ( )   } } " >  
 	 	 < / f o r m >  
 	 < / d i v >  
 @ e n d s e c t i o n
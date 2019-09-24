class Arbre:

    def __init__(self, value):
        self.value = value
        self.left = None
        self.right = None
        self.parent = None

    def ajouter(self, node):
        if node > self.value:
            if self.left is None:
                self.left = Arbre(node)
                return self.left
            else:
                self.right = Arbre(node)
                return self.right
        else: 
            self.parent = Arbre(node)
            return self.parent
    
    def affichage(vue): 
        if vue is not None: 
            affichage(vue.left) 
            print(vue.value) 
            affichage(vue.right) 


affichage.insert(vue, 1) 
print(vue.value)

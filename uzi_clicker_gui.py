import tkinter as tk
from tkinter import ttk


WINDOW_TITLE = "UziClicker"
BG_COLOR = "#0b0f14"
PANEL_COLOR = "#0f131a"
ACCENT_COLOR = "#3db6ff"
TEXT_COLOR = "#e6f2ff"


class UziClickerApp(tk.Tk):
    def __init__(self) -> None:
        super().__init__()
        self.title(WINDOW_TITLE)
        self.configure(bg=BG_COLOR)
        self.geometry("900x520")
        self.resizable(False, False)

        self._configure_styles()
        self._build_layout()

    def _configure_styles(self) -> None:
        style = ttk.Style(self)
        style.theme_use("clam")
        style.configure(
            "Dark.TFrame",
            background=BG_COLOR,
        )
        style.configure(
            "Panel.TFrame",
            background=PANEL_COLOR,
        )
        style.configure(
            "Title.TLabel",
            background=BG_COLOR,
            foreground=TEXT_COLOR,
            font=("Segoe UI", 16, "bold"),
        )
        style.configure(
            "Section.TLabel",
            background=PANEL_COLOR,
            foreground=ACCENT_COLOR,
            font=("Segoe UI", 11, "bold"),
        )
        style.configure(
            "Body.TLabel",
            background=PANEL_COLOR,
            foreground=TEXT_COLOR,
            font=("Segoe UI", 10),
        )
        style.configure(
            "Accent.TButton",
            background=BG_COLOR,
            foreground=TEXT_COLOR,
            font=("Segoe UI", 10, "bold"),
            bordercolor=ACCENT_COLOR,
            focuscolor=ACCENT_COLOR,
            padding=6,
        )
        style.map(
            "Accent.TButton",
            background=[("active", PANEL_COLOR)],
            foreground=[("active", TEXT_COLOR)],
        )
        style.configure(
            "Toggle.TButton",
            background=PANEL_COLOR,
            foreground=TEXT_COLOR,
            font=("Segoe UI", 10, "bold"),
            bordercolor=ACCENT_COLOR,
            focuscolor=ACCENT_COLOR,
            padding=6,
        )
        style.configure(
            "Dark.TEntry",
            fieldbackground="#0a0d12",
            background="#0a0d12",
            foreground=TEXT_COLOR,
            bordercolor=ACCENT_COLOR,
            padding=4,
        )
        style.configure(
            "Dark.TCombobox",
            fieldbackground="#0a0d12",
            background="#0a0d12",
            foreground=TEXT_COLOR,
            arrowcolor=ACCENT_COLOR,
            bordercolor=ACCENT_COLOR,
            padding=4,
        )

    def _build_layout(self) -> None:
        container = ttk.Frame(self, style="Dark.TFrame")
        container.pack(fill="both", expand=True, padx=14, pady=14)

        left_nav = ttk.Frame(container, style="Panel.TFrame", width=180)
        left_nav.pack(side="left", fill="y")

        content = ttk.Frame(container, style="Panel.TFrame")
        content.pack(side="right", fill="both", expand=True, padx=(14, 0))

        ttk.Label(left_nav, text="UziClicker", style="Title.TLabel").pack(
            pady=(12, 18)
        )

        nav_items = [
            "Konto",
            "Makro",
            "Klepa",
            "Loginy",
            "Kopanie",
            "Dodatki",
            "Ustawienia",
        ]
        for item in nav_items:
            ttk.Button(left_nav, text=item, style="Accent.TButton").pack(
                fill="x", padx=14, pady=6
            )

        header = ttk.Frame(content, style="Panel.TFrame")
        header.pack(fill="x", pady=(6, 12))
        ttk.Label(
            header,
            text="Opcje kopania na stoniarkach",
            style="Section.TLabel",
        ).pack(side="left", padx=10)
        ttk.Label(
            header, text="Włączanie/Wyłączanie", style="Section.TLabel"
        ).pack(side="right", padx=10)

        option_row = ttk.Frame(content, style="Panel.TFrame")
        option_row.pack(fill="x", padx=10, pady=4)
        ttk.Label(option_row, text="Opcja jedzenia", style="Body.TLabel").grid(
            row=0, column=0, sticky="w"
        )
        ttk.Label(
            option_row,
            text="OFF",
            style="Body.TLabel",
            foreground="#ff4d4d",
        ).grid(row=0, column=1, padx=8)
        ttk.Button(option_row, text="Bind: U", style="Accent.TButton").grid(
            row=0, column=2, padx=8
        )

        command_row = ttk.Frame(content, style="Panel.TFrame")
        command_row.pack(fill="x", padx=10, pady=8)
        ttk.Label(
            command_row, text="Komendy podczas kopania", style="Body.TLabel"
        ).grid(row=0, column=0, sticky="w")
        combo = ttk.Combobox(
            command_row,
            values=["/kop", "/gornik", "/kopanie"],
            style="Dark.TCombobox",
            width=28,
        )
        combo.grid(row=0, column=1, padx=8)
        combo.set("Wybierz komendę")
        ttk.Button(command_row, text="Dodaj", style="Accent.TButton").grid(
            row=0, column=2, padx=6
        )
        ttk.Button(command_row, text="Usuń", style="Accent.TButton").grid(
            row=0, column=3
        )

        mining_row = ttk.Frame(content, style="Panel.TFrame")
        mining_row.pack(fill="x", padx=10, pady=10)

        left_section = ttk.Frame(mining_row, style="Panel.TFrame")
        left_section.grid(row=0, column=0, sticky="nsew", padx=(0, 20))
        ttk.Label(left_section, text="Kopanie na kilofie wydajność 5", style="Body.TLabel").pack(
            anchor="w", pady=4
        )
        ttk.Label(left_section, text="Opcja kucania", style="Body.TLabel").pack(
            anchor="w", pady=4
        )
        ttk.Label(
            left_section,
            text="OFF",
            style="Body.TLabel",
            foreground="#ff4d4d",
        ).pack(anchor="w", padx=20)
        ttk.Label(left_section, text="Kopanie na kilofie wydajność 6", style="Body.TLabel").pack(
            anchor="w", pady=4
        )

        right_section = ttk.Frame(mining_row, style="Panel.TFrame")
        right_section.grid(row=0, column=1, sticky="nsew")
        ttk.Label(right_section, text="Koparka liści", style="Section.TLabel").pack(
            anchor="w", pady=4
        )
        ttk.Button(right_section, text="Bind: J", style="Accent.TButton").pack(
            anchor="w", pady=4
        )
        ttk.Button(right_section, text="Slot nożyc: 8", style="Accent.TButton").pack(
            anchor="w", pady=4
        )
        ttk.Button(right_section, text="Slot liści: 9", style="Accent.TButton").pack(
            anchor="w", pady=4
        )

        footer = ttk.Frame(content, style="Panel.TFrame")
        footer.pack(fill="x", padx=10, pady=(6, 0))
        ttk.Label(footer, text="Wielkość stoniarek", style="Body.TLabel").grid(
            row=0, column=0, sticky="w"
        )
        ttk.Entry(footer, width=6, style="Dark.TEntry").grid(row=0, column=1, padx=6)
        ttk.Entry(footer, width=6, style="Dark.TEntry").grid(row=0, column=2)


if __name__ == "__main__":
    app = UziClickerApp()
    app.mainloop()
